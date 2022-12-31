<?php

/**
 * @copyright Copyright (C) 2015-2021 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

namespace app\models;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property string $leader
 *
 * @property SplatfestTeam[] $splatfestTeams
 * @property Splatfest[] $fests
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'leader'], 'required'],
            [['id'], 'integer'],
            [['name', 'leader'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'leader' => 'Leader',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplatfestTeams()
    {
        return $this->hasMany(SplatfestTeam::class, ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFests()
    {
        return $this->hasMany(Splatfest::class, ['id' => 'fest_id'])
            ->viaTable('splatfest_team', ['team_id' => 'id']);
    }
}
