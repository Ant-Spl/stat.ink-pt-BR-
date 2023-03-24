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
  'attribute' => 'defeated_by_me',
  'contentOptions' => fn (array $row): array => [
    'class' => 'text-right',
    'data-sort-value' => (int)ArrayHelper::getValue($row, 'defeated_by_me'),
  ],
  'encodeLabel' => false,
  'format' => 'integer',
  'headerOptions' => [
    'class' => 'auto-tooltip text-center',
    'data' => [
      'sort' => 'int',
      'sort-default' => 'desc',
      'sort-onload' => 'yes',
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
];
