<?php

/**
 * @copyright Copyright (C) 2015-2017 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

namespace app\models;

use Yii;
use app\components\helpers\Translator;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "weapon2".
 *
 * @property integer $id
 * @property string $key
 * @property integer $type_id
 * @property integer $subweapon_id
 * @property integer $special_id
 * @property string $name
 * @property integer $canonical_id
 * @property integer $main_group_id
 * @property integer $splatnet
 *
 * @property Special2 $special
 * @property Subweapon2 $subweapon
 * @property Weapon2 $canonical
 * @property Weapon2 $mainReference
 * @property WeaponType2 $type
 */
class Weapon2 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weapon2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'type_id', 'subweapon_id', 'special_id', 'name', 'canonical_id', 'main_group_id'], 'required'],
            [['type_id', 'subweapon_id', 'special_id', 'canonical_id', 'main_group_id'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 32],
            [['key'], 'unique'],
            [['name'], 'unique'],
            [['splatnet'], 'integer'],
            [['special_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Special2::class,
                'targetAttribute' => ['special_id' => 'id'],
            ],
            [['subweapon_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Subweapon2::class,
                'targetAttribute' => ['subweapon_id' => 'id'],
            ],
            [['canonical_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Weapon2::class,
                'targetAttribute' => ['canonical_id' => 'id'],
            ],
            [['main_group_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Weapon2::class,
                'targetAttribute' => ['main_group_id' => 'id'],
            ],
            [['type_id'], 'exist', 'skipOnError' => true,
                'targetClass' => WeaponType2::class,
                'targetAttribute' => ['type_id' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'type_id' => 'Type ID',
            'subweapon_id' => 'Subweapon ID',
            'special_id' => 'Special ID',
            'name' => 'Name',
            'canonical_id' => 'Canonical ID',
            'main_group_id' => 'Main Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecial()
    {
        return $this->hasOne(Special2::class, ['id' => 'special_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubweapon()
    {
        return $this->hasOne(Subweapon2::class, ['id' => 'subweapon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCanonical()
    {
        return $this->hasOne(Weapon2::class, ['id' => 'canonical_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainReference()
    {
        return $this->hasOne(Weapon2::class, ['id' => 'main_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(WeaponType2::class, ['id' => 'type_id']);
    }

    public function toJsonArray()
    {
        return [
            'key' => $this->key,
            'splatnet' => $this->splatnet,
            'type' => $this->type->toJsonArray(),
            'name' => Translator::translateToAll('app-weapon2', $this->name),
            'sub' => $this->subweapon->toJsonArray(),
            'special' => $this->special->toJsonArray(),
            'reskin_of' => $this->id === $this->canonical_id
                ? null
                : $this->canonical->key,
            'main_ref' => $this->id === $this->main_group_id
                ? $this->key
                : $this->mainReference->key,
        ];
    }
}
