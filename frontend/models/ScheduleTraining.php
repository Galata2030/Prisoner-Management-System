<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "schedule_training".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $training_duration
 * @property int|null $prisoner_id
 * @property string|null $training_course
 *
 * @property Prisoner $prisoner
 */
class ScheduleTraining extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['start_date', 'end_date'], 'required'],
            [['id'], 'required'],
            [['id', 'prisoner_id'], 'integer'],
            [['first_name', 'prisoner_id', 'last_name', 'training_duration', 'training_course', 'trainer_name'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'training_duration', 'training_course', 'trainer_name'], 'required'],
            [['id'], 'unique'],
            [['prisoner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prisoner::class, 'targetAttribute' => ['prisoner_id' => 'prisoner_id']],
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
            'training_duration' => 'Training Duration',
            'prisoner_id' => 'Prisoner ID',
            'training_course' => 'Training Course',
            'trainer_name' => 'Trainer Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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
