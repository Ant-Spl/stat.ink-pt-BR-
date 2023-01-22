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
  'getX' => 'avg_kill',
  'xLabel' => Yii::t('app', 'Avg Kills'),
]);
