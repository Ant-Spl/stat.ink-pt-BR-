<?php

declare(strict_types=1);

use app\models\LobbyGroup3;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var LobbyGroup3 $lobbyGroup
 * @var View $this
 */

?>
<?= Html::tag(
  'h2',
  Html::encode(Yii::t('app-lobby3', $lobbyGroup->name)),
  [
    'class' => 'mt-2 mb-2',
    'id' => sprintf('lobby-%s', $lobbyGroup->key),
  ],
) ?>
