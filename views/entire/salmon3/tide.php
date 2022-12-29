<?php

declare(strict_types=1);

use app\components\widgets\AdWidget;
use app\components\widgets\SnsWidget;
use app\models\Map3;
use app\models\SalmonEvent3;
use app\models\SalmonMap3;
use app\models\SalmonWaterLevel2;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var array<int, Map3> $bigMaps
 * @var array<int, SalmonEvent3> $events
 * @var array<int, SalmonMap3> $maps
 * @var array<int, SalmonWaterLevel2> $tides
 * @var array[] $mapTides
 */

$this->context->layout = 'main';

$title = vsprintf('%s - %s', [
  Yii::t('app-salmon3', 'Salmon Run'),
  Yii::t('app-salmon-tide2', 'Water Level'),
]);
$this->title = vsprintf('%s | %s', [
  $title,
  Yii::$app->name,
]);

?>
<div class="container">
  <h1><?= Html::encode($title) ?></h1>

  <?= AdWidget::widget() . "\n" ?>
  <?= SnsWidget::widget() . "\n" ?>

  <?= $this->render('tide/tide', compact('bigMaps', 'maps', 'tides', 'mapTides')) . "\n" ?>
  <?= $this->render('tide/event', compact('bigMaps', 'events', 'maps', 'tides', 'mapTides')) . "\n" ?>
</div>
