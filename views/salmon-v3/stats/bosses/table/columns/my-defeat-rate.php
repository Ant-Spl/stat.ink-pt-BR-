<?php

declare(strict_types=1);

use app\assets\Spl3SalmonUniformAsset;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\AssetManager;
use yii\web\View;

/**
 * @var User $user
 * @var View $this
 */

$am = Yii::$app->assetManager;
assert($am instanceof AssetManager);

return [
  'contentOptions' => function (array $row): array {
    $appearances = (int)ArrayHelper::getValue($row, 'appearances');
    $defeated = (int)ArrayHelper::getValue($row, 'defeated_by_me');
    return [
      'class' => 'text-right',
      'data-sort-value' => $appearances < 1 ? -1.0 : ($defeated / $appearances),
    ];
  },
  'encodeLabel' => false,
  'format' => ['percent', 1],
  'headerOptions' => [
    'class' => 'auto-tooltip text-center',
    'data' => [
      'sort' => 'float',
      'sort-default' => 'desc',
    ],
    'title' => Yii::t('app-salmon3', 'Defeated by {user}', ['user' => $user->name]),
  ],
  'label' => implode(' ', [
    Html::img(
      $am->getAssetUrl(
        $am->getBundle(Spl3SalmonUniformAsset::class),
        'orange.png',
      ),
      [
        'class' => 'basic-icon',
        'draggable' => 'false',
      ],
    ),
    Html::encode($user->name),
  ]),
  'value' => function (array $row): ?float {
    $appearances = (int)ArrayHelper::getValue($row, 'appearances');
    $defeated = (int)ArrayHelper::getValue($row, 'defeated_by_me');
    return $appearances < 1 ? null : ($defeated / $appearances);
  },
];
