<?php

declare(strict_types=1);

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

$this->registerJs(sprintf(
  '$(%s).change(function(){location.href=$("option:selected",this).data("url")});',
  Json::encode('#region-filter')
));

?>
<nav class="mb-2 form-inline">
  <div class="form-group mb-0">
    <label for="region-filter">
      <?= Html::encode(Yii::t('app', 'Splatfest Region:')) . "\n" ?>
    </label>
    <select id="region-filter" class="form-control">
      <?= Html::tag(
        'option',
        Html::encode(Yii::t('app', 'Guess the region')),
        [
          'data-url' => Url::to(
            ['show-v2/user-stat-splatfest',
              'screen_name' => $user->screen_name,
            ],
            true
          ),
        ]
      ) . "\n" ?>
      <?= implode('', ArrayHelper::getColumn(
        $regions,
        fn($next) => Html::tag(
          'option',
          Html::encode(Yii::t('app', $next->name)),
          [
            'data-url' => Url::to(
              ['show-v2/user-stat-splatfest',
                'screen_name' => $user->screen_name,
                'region' => $next->key,
              ],
              true
            ),
            'selected' => $next->key === $input->region,
          ]
        )
      )) . "\n" ?>
    </select>
<?php if (!$input->region) { ?>
    <span>
      <?= Html::encode(Yii::t('app', 'Guessed:')) . "\n" ?>
      <?= Html::encode(Yii::t('app', $region->name)) . "\n" ?>
    </span>
<?php } ?>
  </div>
</nav>
