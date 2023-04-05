<?php

/**
 * @copyright Copyright (C) 2015-2023 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "salmon_map3".
 *
 * @property integer $id
 * @property string $key
 * @property string $name
 * @property string $short_name
 *
 * @property Salmon3[] $salmon3s
 * @property SalmonMap3Alias[] $salmonMap3Aliases
 * @property SalmonSchedule3[] $salmonSchedule3s
 * @property StatSalmon3TideEvent[] $statSalmon3TideEvents
 * @property UserBadge3EggsecutiveReached[] $userBadge3EggsecutiveReacheds
 * @property User[] $users
 */
class SalmonMap3 extends ActiveRecord
{
    public static function tableName()
    {
        return 'salmon_map3';
    }

    public function rules()
    {
        return [
            [['key', 'name', 'short_name'], 'required'],
            [['key'], 'string', 'max' => 32],
            [['name', 'short_name'], 'string', 'max' => 63],
            [['key'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'name' => 'Name',
            'short_name' => 'Short Name',
        ];
    }

    public function getSalmon3s(): ActiveQuery
    {
        return $this->hasMany(Salmon3::class, ['stage_id' => 'id']);
    }

    public function getSalmonMap3Aliases(): ActiveQuery
    {
        return $this->hasMany(SalmonMap3Alias::class, ['map_id' => 'id']);
    }

    public function getSalmonSchedule3s(): ActiveQuery
    {
        return $this->hasMany(SalmonSchedule3::class, ['map_id' => 'id']);
    }

    public function getStatSalmon3TideEvents(): ActiveQuery
    {
        return $this->hasMany(StatSalmon3TideEvent::class, ['stage_id' => 'id']);
    }

    public function getUserBadge3EggsecutiveReacheds(): ActiveQuery
    {
        return $this->hasMany(UserBadge3EggsecutiveReached::class, ['stage_id' => 'id']);
    }

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('user_badge3_eggsecutive_reached', ['stage_id' => 'id']);
    }
}
