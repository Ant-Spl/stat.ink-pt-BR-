<?php

declare(strict_types=1);

use app\assets\GameModeIconsAsset;
use app\models\Rule3;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Rule3|null $rule
 * @var View $this
 * @var string|null $tag
 * @var string|true|null $id
 */

if (!$rule) {
  return;
}

if (($id ?? null) === true) {
  $id = $rule->key;
}

echo Html::tag(
  $tag ?? 'h2',
  implode(' ', [
    Html::img(
      Yii::$app->assetManager->getAssetUrl(
        Yii::$app->assetManager->getBundle(GameModeIconsAsset::class),
        sprintf('spl3/%s.png', $rule->key),
      ),
      [
        'class' => 'basic-icon',
        'style' => [
          '--icon-height' => '1em',
        ],
      ],
    ),
    Html::encode(Yii::t('app-rule3', $rule->name)),                                                                      ]),
  [
    'class' => 'm-0 mb-3',
    'id' => $id ?? null,
  ],
);
