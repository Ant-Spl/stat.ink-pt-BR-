<?php

declare(strict_types=1);

use app\models\StatWeapon3Usage;

$calc = fn (StatWeapon3Usage $model): ?float => $model->seconds > 0 && $model->battles > 0
  ? $model->avg_death / ($model->seconds / $model->battles) * 60.0
  : null;

return [
  'contentOptions' => fn (StatWeapon3Usage $model): array => [
    'class' => 'text-right',
    'data-sort-value' => $calc($model),
  ],
  'format' => ['decimal', 3],
  'headerOptions' => ['data-sort' => 'float'],
  'label' => Yii::t('app', 'Deaths/min'),
  'value' => fn (StatWeapon3Usage $model): ?float => $calc($model),
];
