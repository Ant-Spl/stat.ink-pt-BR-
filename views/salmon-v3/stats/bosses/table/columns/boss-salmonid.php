<?php

declare(strict_types=1);

use app\assets\Spl3SalmonidAsset;
use app\components\helpers\TypeHelper;
use app\models\SalmonBoss3;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\AssetManager;
use yii\web\View;

/**
 * @var User $user
 * @var View $this
 * @var array<string, SalmonBoss3> $bosses
 * @var array<string, array{boss_key: string, appearances: int, defeated: int, defeated_by_me: int}> $stats
 */

$am = Yii::$app->assetManager;
assert($am instanceof AssetManager);

return [
  'contentOptions' => function (array $row) use ($bosses): array {
    $key = TypeHelper::string(ArrayHelper::getValue($row, 'boss_key'));
    $boss = ArrayHelper::getValue($bosses, $key);
    if (!$boss instanceof SalmonBoss3) {
      return [];
    }

    return [
      'data' => [
        'sort-value' => Yii::t('app-salmon-boss3', $boss->name),
      ],
    ];
  },
  'encodeLabel' => false,
  'format' => 'raw',
  'headerOptions' => [
    'class' => 'text-center',
    'data' => [
      'sort' => 'string',
      'sort-default' => 'asc',
    ],
  ],
  'label' => Html::tag(
    'span',
    Html::encode(Yii::t('app-salmon3', 'Boss Salmonid')),
    ['class' => 'd-none d-md-inline'],
  ),
  'value' => function (array $row) use ($am, $bosses): string {
    $key = TypeHelper::string(ArrayHelper::getValue($row, 'boss_key'));
    $boss = ArrayHelper::getValue($bosses, $key);
    if ($boss instanceof SalmonBoss3) {
      return implode(' ', [
        Html::img(
          $am->getAssetUrl(
            $am->getBundle(Spl3SalmonidAsset::class),
            sprintf('%s.png', rawurlencode($key)),
          ),
          [
            'class' => 'basic-icon',
            'draggable' => 'false',
            'style' => '--icon-height:2em',
          ],
        ),
        Html::tag(
          'span',
          Html::encode(Yii::t('app-salmon-boss3', $boss->name)),
          ['class' => 'd-none d-md-inline'],
        ),
      ]);
    }
    return '';
  },
];
