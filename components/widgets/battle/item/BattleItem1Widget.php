<?php

/**
 * @copyright Copyright (C) 2015-2019 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\components\widgets\battle\item;

use DateTimeImmutable;
use DateTimeZone;
use Yii;
use app\models\User;
use statink\yii2\stages\spl1\Spl1Stage;

class BattleItem1Widget extends BaseWidget
{
    public function getHasBattleEndAt(): bool
    {
        return !!$this->model->end_at;
    }

    public function getBattleEndAt(): ?DateTimeImmutable
    {
        if (!$endAt = $this->model->end_at) {
            return null;
        }

        return (new DateTimeImmutable($endAt))
            ->setTimezone(new DateTimeZone(Yii::$app->timeZone));
    }

    public function getDescription(): string
    {
        $rule   = '?';
        $map    = '?';
        $result = '?';
        if ($this->model->rule) {
            $rule = Yii::t('app-rule', $this->model->rule->name);
        }
        if ($this->model->map) {
            $map = Yii::t('app-map', $this->model->map->name);
        }
        if ($this->model->is_win !== null) {
            $result = Yii::t('app', $this->model->is_win ? 'Won' : 'Lost');
        }
        return implode(' / ', [
            $rule,
            $map,
            $result,
        ]);
    }

    public function getImageUrl(): string
    {
        if ($this->model->battleImageResult) {
            return $this->model->battleImageResult->url;
        } elseif ($this->model->map && $this->model->is_win !== null) {
            return Spl1Stage::url(
                $this->model->is_win ? 'daytime-blur' : 'gray-blur',
                $this->model->map->key
            );
        } else {
            return $this->getImagePlaceholderUrl();
        }
    }

    public function getLinkRoute(): array
    {
        $user = $this->getUser();
        return [
            'show/battle',
            'screen_name' => $user->screen_name,
            'battle' => $this->model->id,
        ];
    }

    public function getModeIcons(): array
    {
        return [];
    }

    public function getRuleKey(): string
    {
        if (!$rule = $this->model->rule) {
            return 'unknown';
        }
        return $rule->key;
    }

    public function getRuleName(): string
    {
        if (!$rule = $this->model->rule) {
            return Yii::t('app', 'Unknown');
        }
        return Yii::t('app-rule', $rule->name);
    }

    public function getUser(): User
    {
        return $this->model->user;
    }

    public function getUserLinkRoute(): array
    {
        $user = $this->getUser();
        return [
            'show-user/profile',
            'screen_name' => $user->screen_name,
        ];
    }
}
