<?php

/**
 * @copyright Copyright (C) 2015-2022 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "salmon_schedule3".
 *
 * @property integer $id
 * @property integer $map_id
 * @property string $start_at
 * @property string $end_at
 * @property integer $big_map_id
 *
 * @property Map3 $bigMap
 * @property BigrunOfficialResult3 $bigrunOfficialResult3
 * @property SalmonMap3 $map
 * @property Salmon3[] $salmon3s
 * @property SalmonScheduleWeapon3[] $salmonScheduleWeapon3s
 * @property UserStatBigrun3[] $userStatBigrun3s
 * @property User[] $users
 */
class SalmonSchedule3 extends ActiveRecord
{
    public static function tableName()
    {
        return 'salmon_schedule3';
    }

    public function rules()
    {
        return [
            [['map_id', 'big_map_id'], 'default', 'value' => null],
            [['map_id', 'big_map_id'], 'integer'],
            [['start_at', 'end_at'], 'required'],
            [['start_at', 'end_at'], 'safe'],
            [['start_at'], 'unique'],
            [['big_map_id'], 'exist', 'skipOnError' => true, 'targetClass' => Map3::class, 'targetAttribute' => ['big_map_id' => 'id']],
            [['map_id'], 'exist', 'skipOnError' => true, 'targetClass' => SalmonMap3::class, 'targetAttribute' => ['map_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'map_id' => 'Map ID',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'big_map_id' => 'Big Map ID',
        ];
    }

    public function getBigMap(): ActiveQuery
    {
        return $this->hasOne(Map3::class, ['id' => 'big_map_id']);
    }

    public function getBigrunOfficialResult3(): ActiveQuery
    {
        return $this->hasOne(BigrunOfficialResult3::class, ['schedule_id' => 'id']);
    }

    public function getMap(): ActiveQuery
    {
        return $this->hasOne(SalmonMap3::class, ['id' => 'map_id']);
    }

    public function getSalmon3s(): ActiveQuery
    {
        return $this->hasMany(Salmon3::class, ['schedule_id' => 'id']);
    }

    public function getSalmonScheduleWeapon3s(): ActiveQuery
    {
        return $this->hasMany(SalmonScheduleWeapon3::class, ['schedule_id' => 'id']);
    }

    public function getUserStatBigrun3s(): ActiveQuery
    {
        return $this->hasMany(UserStatBigrun3::class, ['schedule_id' => 'id']);
    }

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('user_stat_bigrun3', ['schedule_id' => 'id']);
    }
}
