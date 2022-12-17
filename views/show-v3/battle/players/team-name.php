<?php

declare(strict_types=1);

use app\assets\GameModeIconsAsset;
use app\models\Splatfest3Theme;
use app\models\TricolorRole3;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Splatfest3Theme|null $theme
 * @var TricolorRole3|null $role
 * @var View $this
 * @var bool $ourTeam
 */

if ($theme || $role) {
  $am = $role ? Yii::$app->assetManager : null;
  echo implode(
    ' ',
    array_filter(
      [
        $role
          ? Html::img(
            $am->getAssetUrl(
              $am->getBundle(GameModeIconsAsset::class),
              sprintf('spl3/tricolor-%s.png', $role->key),
            ),
            [
              'class' => 'auto-tooltip basic-icon',
              'draggable' => 'false',
              'title' => Yii::t('app-rule3', $role->name),
            ],
          )
          : null,
        $theme
          ? Html::encode($theme->name)
          : null,
        $role
          ? vsprintf($theme ? '(%s)' : '%s', [
            Html::encode(Yii::t('app-rule3', $role->name)),
          ])
          : null,
      ],
      fn (?string $v): bool => $v !== null,
    ),
  );
} else {
  echo Html::encode(Yii::t('app', $ourTeam ? 'Good Guys' : 'Bad Guys'));
}
