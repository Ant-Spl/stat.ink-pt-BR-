<?php

declare(strict_types=1);

use app\models\Lobby3;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */

$lobbies = Lobby3::find()
  ->andWhere([
    'key' => [
      'regular',
      'bankara_challenge',
      'xmatch',
    ],
  ])
  ->orderBy(['rank' => SORT_ASC])
  ->cache(86400)
  ->all();

echo Html::tag(
  'nav',
  Html::tag(
    'ul',
    implode('', [
      implode('', array_map(
        function (Lobby3 $lobby) : string {
          return Html::tag(
            'li',
            Html::a(
              Html::encode(Yii::t('app-lobby3', $lobby->name)),
              ['entire/weapons3',
                'lobby' => $lobby->key,
                'rule' => $lobby->key === 'regular' ? 'nawabari' : 'area',
              ],
              ['role' => 'presentation']
            ),
          );
        },
        $lobbies,
      )),
      Html::tag(
        'li',
        Html::tag('a', Html::encode(Yii::t('app-lobby3', 'Challenge'))),
        [
          'class' => 'active',
          'role' => 'presentation',
        ],
      ),
    ]),
    ['class' => 'nav nav-pills'],
  ),
  ['class' => 'mb-1'],
);
