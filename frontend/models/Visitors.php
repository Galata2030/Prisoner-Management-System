<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "visitors".
 *
 * @property int $visitor_id
 * @property int|null $prisoner_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $sex
 * @property string|null $address
 * @property string|null $phone_no
 *
 * @property Prisoner $prisoner
 */
class Visitors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visitors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visitor_id'], 'required'],
            [['visitor_id', 'prisoner_id'], 'integer'],
            [['first_name', 'last_name', 'sex', 'address', 'phone_no'], 'required'],
            [['visitor_id'], 'unique'],
            [['prisoner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prisoner::class, 'targetAttribute' => ['prisoner_id' => 'prisoner_id']],
            [['phone_no'], 'integer', 'max' => 10]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'visitor_id' => 'Visitor ID',
            'prisoner_id' => 'Prisoner ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sex' => 'Sex',
            'address' => 'Address',
            'phone_no' => 'Phone No',
        ];
    }

    /**
     * Gets query for [[Prisoner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrisoner()
    {
        return $this->hasOne(Prisoner::class, ['prisoner_id' => 'prisoner_id']);
    }
}
