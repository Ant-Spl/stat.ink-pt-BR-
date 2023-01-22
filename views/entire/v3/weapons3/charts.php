<?php

declare(strict_types=1);

use app\models\StatWeapon3Usage;
use app\models\StatWeapon3UsagePerVersion;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var StatWeapon3Usage[]|StatWeapon3UsagePerVersion[] $data
 * @var View $this
 */

if (!$data) {
  return;
}

echo Html::tag(
  'div',
  implode('', [
    $this->render('charts/kill', compact('data')),
    $this->render('charts/kill-per-min', compact('data')),
    $this->render('charts/death', compact('data')),
    $this->render('charts/death-per-min', compact('data')),
    $this->render('charts/kill-ratio', compact('data')),
    $this->render('charts/ka-ratio', compact('data')),
    $this->render('charts/ka-per-min', compact('data')),
    $this->render('charts/kill-adv', compact('data')),
    $this->render('charts/assist', compact('data')),
    $this->render('charts/assist-per-min', compact('data')),
    $this->render('charts/special', compact('data')),
    $this->render('charts/special-per-min', compact('data')),
    $this->render('charts/inked', compact('data')),
    $this->render('charts/inked-per-min', compact('data')),
  ]),
  ['class' => 'mb-3 row'],
);
