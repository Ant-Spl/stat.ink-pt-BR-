<?php

/**
 * @copyright Copyright (C) 2015-2018 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\models;

use Yii;
use app\components\helpers\Translator;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "salmon_title2".
 *
 * @property integer $id
 * @property string $key
 * @property string $name
 * @property integer $splatnet
 */
class SalmonTitle2 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salmon_title2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name'], 'required'],
            [['splatnet'], 'default', 'value' => null],
            [['splatnet'], 'integer'],
            [['key'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 64],
            [['key'], 'unique'],
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
            'name' => 'Name',
            'splatnet' => 'Splatnet',
        ];
    }

    public function getTranslatedName(?Gender $gender = null): string
    {
        $text = $this->name;
        if ($gender) {
            if ($gender->id == 1) {
                $text = "{boy}{$text}";
            } else {
                $text = "{girl}{$text}";
            }
        }

        return Yii::t('app-salmon-title2', $text, [
            'boy' => '',
            'girl' => '',
        ]);
    }

    public function toJsonArray(?Gender $gender = null): array
    {
        $text = $this->name;
        if ($gender) {
            if ($gender->id == 1) {
                $text = "{boy}{$text}";
            } else {
                $text = "{girl}{$text}";
            }
        }

        return [
            'key' => $this->key,
            'splatnet' => $this->splatnet,
            'name' => Translator::translateToAll('app-salmon-title2', $text, [
                'boy' => '',
                'girl' => '',
            ]),
            'generic_name' => Translator::translateToAll('app-salmon-title2', $this->name),
        ];
    }
}
