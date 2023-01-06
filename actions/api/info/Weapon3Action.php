<?php

/**
 * @copyright Copyright (C) 2015-2023 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\actions\api\info;

use Yii;
use app\models\Language;
use app\models\SalmonWeapon3;
use app\models\Special3;
use app\models\SplatoonVersion3;
use app\models\Subweapon3;
use app\models\Weapon3;
use app\models\XMatchingGroup3;
use app\models\XMatchingGroupVersion3;
use app\models\XMatchingGroupWeapon3;
use yii\base\Action;
use yii\db\Transaction;
use yii\helpers\ArrayHelper;

use function date;
use function strcmp;
use function strnatcasecmp;
use function version_compare;

use const SORT_DESC;

final class Weapon3Action extends Action
{
    public function run()
    {
        return $this->controller->render(
            'weapon3',
            Yii::$app->db->transaction(
                fn (): array => [
                    'langs' => $this->getLangs(),
                    'matchingGroups' => $this->getMatchingGroups($this->getCurrentXMatchingGroupVersion()),
                    'salmons' => $this->getSalmonWeapons(),
                    'specials' => $this->getSpecials(),
                    'subs' => $this->getSubweapons(),
                    'weapons' => $this->getWeapons(),
                ],
                Transaction::REPEATABLE_READ,
            ),
        );
    }

    /**
     * @return Language[]
     */
    private function getLangs(): array
    {
        $sysLang = Yii::$app->language;
        return ArrayHelper::sort(
            Language::find()->standard()->all(),
            fn (Language $a, Language $b): int => ($a->lang === $sysLang ? -1 : 0)
                ?: ($b->lang === $sysLang ? 1 : 0)
                ?: strnatcasecmp($a->name, $b->name),
        );
    }

    private function getSpecials(): array
    {
        return ArrayHelper::sort(
            Special3::find()->with(['special3Aliases'])->all(),
            function (Special3 $a, Special3 $b): int {
                $aN = Yii::t('app-special3', $a->name);
                $bN = Yii::t('app-special3', $b->name);
                return strnatcasecmp($aN, $bN)
                    ?: strcmp($aN, $bN)
                    ?: strnatcasecmp($a->name, $b->name)
                    ?: strcmp($a->name, $b->name);
            },
        );
    }

    private function getSubweapons(): array
    {
        return ArrayHelper::sort(
            Subweapon3::find()->with(['subweapon3Aliases'])->all(),
            function (Subweapon3 $a, Subweapon3 $b): int {
                $aN = Yii::t('app-subweapon3', $a->name);
                $bN = Yii::t('app-subweapon3', $b->name);
                return strnatcasecmp($aN, $bN)
                    ?: strcmp($aN, $bN)
                    ?: strnatcasecmp($a->name, $b->name)
                    ?: strcmp($a->name, $b->name);
            },
        );
    }

    private function getWeapons(): array
    {
        return ArrayHelper::sort(
            Weapon3::find()
                ->with([
                    'mainweapon',
                    'mainweapon.type',
                    'salmonWeapon3',
                    'special',
                    'subweapon',
                    'weapon3Aliases',
                ])
                ->all(),
            function (Weapon3 $a, Weapon3 $b): int {
                $aN = Yii::t('app-weapon3', $a->name);
                $bN = Yii::t('app-weapon3', $b->name);
                return $a->mainweapon->type->rank <=> $b->mainweapon->type->rank
                    ?: strnatcasecmp($aN, $bN)
                    ?: strcmp($aN, $bN)
                    ?: strnatcasecmp($a->name, $b->name)
                    ?: strcmp($a->name, $b->name);
            },
        );
    }

    private function getSalmonWeapons(): array
    {
        return ArrayHelper::sort(
            SalmonWeapon3::find()
                ->with(['salmonWeapon3Aliases'])
                ->andWhere(['weapon_id' => null])
                ->all(),
            function (SalmonWeapon3 $a, SalmonWeapon3 $b): int {
                $aN = Yii::t('app-weapon3', $a->name);
                $bN = Yii::t('app-weapon3', $b->name);
                return strnatcasecmp($aN, $bN)
                    ?: strcmp($aN, $bN)
                    ?: strnatcasecmp($a->name, $b->name)
                    ?: strcmp($a->name, $b->name);
            },
        );
    }

    /**
     * @return array<string, XMatchingGroup3>
     */
    private function getMatchingGroups(?XMatchingGroupVersion3 $version): array
    {
        if (!$version) {
            return [];
        }

        return ArrayHelper::map(
            XMatchingGroupWeapon3::find()
                ->with(['group', 'weapon'])
                ->andWhere(['version_id' => $version->id])
                ->all(),
            'weapon.key',
            'group',
        );
    }

    private function getCurrentXMatchingGroupVersion(): ?XMatchingGroupVersion3
    {
        $currentGameVersion = SplatoonVersion3::find()
            ->andWhere(['<=', 'release_at', date('Y-m-d\TH:i:sP', $_SERVER['REQUEST_TIME'])])
            ->orderBy(['release_at' => SORT_DESC])
            ->limit(1)
            ->one();
        if (!$currentGameVersion) {
            return null;
        }

        $allGroups = ArrayHelper::sort(
            XMatchingGroupVersion3::find()->all(),
            fn (XMatchingGroupVersion3 $a, XMatchingGroupVersion3 $b): int => version_compare(
                $b->minimum_version,
                $a->minimum_version,
            ),
        );
        foreach ($allGroups as $group) {
            if (version_compare($group->minimum_version, $currentGameVersion->tag, '<=')) {
                return $group;
            }
        }

        return null;
    }
}
