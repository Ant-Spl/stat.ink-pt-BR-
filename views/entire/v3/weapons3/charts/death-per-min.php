<?php

declare(strict_types=1);

use app\models\StatWeapon3Usage;
use app\models\StatWeapon3UsagePerVersion;
use yii\web\View;

/**
 * @var StatWeapon3Usage[]|StatWeapon3UsagePerVersion[] $data
 * @var View $this
 */

echo $this->render('includes/chart', [
  'data' => $data,
  'getX' => fn (StatWeapon3Usage|StatWeapon3UsagePerVersion $model): ?float => $model->seconds > 0 && $model->battles > 0
    ? $model->avg_death / ($model->seconds / $model->battles) * 60.0
    : null,
  'xLabel' => Yii::t('app', 'Deaths/min'),
]);
