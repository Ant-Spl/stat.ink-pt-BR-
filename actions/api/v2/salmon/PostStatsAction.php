<?php

/**
 * @copyright Copyright (C) 2015-2018 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\actions\api\v2\salmon;

use Yii;
use app\models\api\v2\PostSalmonStatsForm;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UnauthorizedHttpException;

class PostStatsAction extends \yii\web\ViewAction
{
    public function init()
    {
        parent::init();

        Yii::$app->language = 'en-US';
        Yii::$app->timeZone = 'Etc/UTC';
    }

    public function run()
    {
        if (Yii::$app->user->isGuest) {
            throw new UnauthorizedHttpException('Unauthorized');
        }

        $form = Yii::createObject(PostSalmonStatsForm::class);
        $form->attributes = Yii::$app->request->post();
        if (!$form->save()) {
            return $this->error($form->getErrors(), 400);
        }

        $resp = Yii::$app->response;
        $resp->statusCode = 201;
        $resp->statusText = 'Created';
        $resp->headers->set(
            'location',
            Url::to(['api-v2-salmon/view-stats', 'id' => $form->created_id], true)
        );
        return null;
    }

    private function error(array $errors, int $code): array
    {
        $this->logError($errors);
        return $this->formatError($errors, $code);
    }

    private function formatError(array $errors, int $code): array
    {
        $resp = Yii::$app->getResponse();
        $resp->format = 'json';
        $resp->statusCode = $code;
        return [
            'error' => $errors,
        ];
    }

    private function logError(array $errors): void
    {
        Yii::warning(sprintf(
            'API/SalmonStat Error: RemoteAddr=[%s], Data=%s',
            $_SERVER['REMOTE_ADDR'],
            Json::encode(
                ['error' => $errors],
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            )
        ));
    }
}
