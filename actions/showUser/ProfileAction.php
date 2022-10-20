<?php

/**
 * @copyright Copyright (C) 2015-2022 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

namespace app\actions\showUser;

use Yii;
use app\components\helpers\Battle as BattleHelper;
use app\models\Battle2;
use app\models\Battle3;
use app\models\Battle;
use app\models\User;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

final class ProfileAction extends Action
{
    public function run(?string $tab = null): ?string
    {
        $request = Yii::$app->request;
        $user = User::findOne(['screen_name' => $request->get('screen_name')]);
        if (!$user) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $tab = \trim((string)$tab);
        if ($tab !== '1' && $tab !== '2' && $tab !== '') {
            $this->controller->redirect(
                ['show-user/profile',
                    'screen_name' => $user->screen_name,
                ],
            );
            return null;
        }

        $permLink = Url::to(
            $tab === ''
                ? ['show-user/profile', 'screen_name' => $user->screen_name]
                : ['show-user/profile', 'screen_name' => $user->screen_name, 'tab' => $tab],
            true,
        );
        [$activityFrom, $activityTo] = BattleHelper::getActivityDisplayRange();

        return $this->controller->render('profile', [
            'activityFrom' => $activityFrom,
            'activityTo' => $activityTo,
            'permLink'  => $permLink,
            'tab' => $tab,
            'user' => $user,
        ]);
    }
}
