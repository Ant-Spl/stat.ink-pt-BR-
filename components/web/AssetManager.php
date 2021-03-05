<?php

/**
 * @copyright Copyright (C) 2015-2019 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\web;

use Base32\Base32;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * @inheritdoc
 */
class AssetManager extends \yii\web\AssetManager
{
    /**
     * @inheritdoc
     */
    public function getAssetUrl($bundle, $asset, $appendTimestamp = null)
    {
        if (($actualAsset = $this->resolveAsset($bundle, $asset)) !== false) {
            if (strncmp($actualAsset, '@web/', 5) === 0) {
                $asset = substr($actualAsset, 5);
                $basePath = Yii::getAlias("@webroot");
                $baseUrl = Yii::getAlias("@web");
            } else {
                $asset = Yii::getAlias($actualAsset);
                $basePath = $this->basePath;
                $baseUrl = $this->baseUrl;
            }
        } else {
            $basePath = $bundle->basePath;
            $baseUrl = $bundle->baseUrl;
        }

        if (!Url::isRelative($asset) || strncmp($asset, '/', 1) === 0) {
            return $asset;
        }

        if ($appendTimestamp) {
            foreach (['', '.gz'] as $appendExtension) {
                if (($timestamp = @filemtime("$basePath/{$asset}{$appendExtension}")) > 0) {
                    return "$baseUrl/$asset?v=$timestamp";
                }
            }
        }
        return "$baseUrl/$asset";
    }

    /**
     * @inheritdoc
     */
    protected function hash($path)
    {
        if (is_callable($this->hashCallback)) {
            return call_user_func($this->hashCallback, $path);
        }

        $options = [
            'assetRevision' => (int)ArrayHelper::getValue(Yii::$app->params, 'assetRevision', -1),
            'linkAssets' => !!$this->linkAssets,
        ];
        Yii::info("Asset revision = {$options['assetRevision']}", __METHOD__);

        $appPath = dirname(Yii::getAlias('@webroot'));
        $path = (is_file($path) ? dirname($path) : $path);
        if (strncmp($path, $appPath, strlen($appPath)) === 0) {
            $path = '@app/' . ltrim(substr($path, strlen($appPath)), '/');
        }

        Yii::info("Asset path = {$path}", __METHOD__);
        $profile = "Calc hash ({$path})";
        Yii::beginProfile($profile, __METHOD__);
        $hash = strtolower(substr(
            Base32::encode(hash_hmac('sha256', $path, Json::encode($options), true)),
            0,
            16
        ));
        Yii::endProfile($profile, __METHOD__);
        Yii::info("Asset path hash = {$hash}", __METHOD__);
        return $hash;
    }
}
