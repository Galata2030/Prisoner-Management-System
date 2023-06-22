<?php

namespace frontend\models;

use yii\validators\Validator;
use Yii;

/**
 * This is the model class for table "cell".
 *
 * @property int $block_id
 * @property int|null $prisoner_id
 * @property int|null $bed_no
 * @property int|null $dorm_no
 *
 * @property Prisoner $prisoner
 */
class Cell extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cell';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_id'], 'required'],
            [['block_id', 'prisoner_id', 'bed_no', 'dorm_no'], 'integer'],
            [['prisoner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prisoner::class, 'targetAttribute' => ['prisoner_id' => 'prisoner_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function getPrisoners()
    {
        return $this->hasMany(Prisoner::class, ['dorm_id' => 'prisoner_id']);
    }

    public function attributeLabels()
    {
        return [
            'block_id' => 'Block ID',
            'prisoner_id' => 'Prisoner ID',
            'bed_no' => 'Bed No',
            'dorm_no' => 'Dorm No',
        ];
    }
    /**
     * Gets query for [[Prisoner]].
     *
     * @return \yii\db\ActiveQuery
     */
}
