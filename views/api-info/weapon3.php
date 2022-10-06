<?php

declare(strict_types=1);

use app\components\widgets\AdWidget;
use app\components\widgets\CcBy;
use app\components\widgets\SnsWidget;
use app\models\Language;
use app\models\SalmonWeapon3;
use app\models\Special3;
use app\models\Subweapon3;
use app\models\Weapon3;
use yii\bootstrap\Html;
use yii\web\View;

/**
 * @var Language[] $langs
 * @var SalmonWeapon3[] $salmons
 * @var Special3[] $specials
 * @var Subweapon3[] $subs
 * @var View $this
 * @var Weapon3[] $weapons
 */

$this->context->layout = 'main';
$this->title = Yii::t('app', 'API Info: Weapons (Splatoon 3)');

$this->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary']);
$this->registerMetaTag(['name' => 'twitter:title', 'content' => $this->title]);
$this->registerMetaTag(['name' => 'twitter:description', 'content' => $this->title]);
$this->registerMetaTag(['name' => 'twitter:site', 'content' => '@stat_ink']);

?>
<div class="container">
  <h1><?= Html::encode($this->title) ?></h1>
  <?= AdWidget::widget() . "\n" ?>
  <?= SnsWidget::widget() . "\n" ?>
  <p>
    <?= implode(' ', [
      Html::a(
        implode('', [
          Html::tag('span', '', ['class' => ['fas fa-file-code fa-fw']]),
          Html::encode(Yii::t('app', 'JSON format')),
        ]),
        ['api-v3/weapon'],
        ['class' => 'label label-default']
      ),
      Html::a(
        implode('', [
          Html::tag('span', '', ['class' => ['fas fa-file-code fa-fw']]),
          Html::encode(Yii::t('app', 'JSON format (All langs)')),
        ]),
        ['api-v3/weapon', 'full' => 1],
        ['class' => 'label label-default']
      ),
    ]) . "\n" ?>
  </p>

  <?= $this->render('weapon3/main', ['langs' => $langs, 'weapons' => $weapons]) . "\n" ?>
  <?= $this->render('weapon3/salmon', ['langs' => $langs, 'weapons' => $salmons]) . "\n" ?>
  <?= $this->render('weapon3/sub', ['langs' => $langs, 'subs' => $subs]) . "\n" ?>
  <?= $this->render('weapon3/special', ['langs' => $langs, 'specials' => $specials]) . "\n" ?>
  <hr>
  <?= CcBy::widget() . "\n" ?>
</div>
