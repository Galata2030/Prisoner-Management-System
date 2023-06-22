<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "schedule_guard".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $guard_id
 *
 * @property Guard $guard
 */
class ScheduleGuard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_guard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['guard_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'guard_id', 'start_date', 'end_date'], 'required'],
            [['guard_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guard::class, 'targetAttribute' => ['guard_id' => 'guard_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'guard_id' => 'Guard ID',
        ];
    }

    /**
     * Gets query for [[Guard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuard()
    {
        return $this->hasOne(Guard::class, ['guard_id' => 'guard_id']);
    }
}
