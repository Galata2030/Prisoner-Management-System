<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "prisoner".
 *
 * @property int $prisoner_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $age
 * @property string|null $sex
 * @property string|null $entry_date
 * @property string|null $release_date
 * @property string|null $case
 * @property string|null $region
 * @property string|null $zone
 * @property string|null $woreda
 * @property string|null $kebele
 * @property int|null $visitor_id
 *
 * @property Cell[] $cells
 * @property Visitors $visitor
 * @property Visitors[] $visitors
 */
class Prisoner extends \yii\db\ActiveRecord
{
    const STATUS_RELEASED = 0;
    const STATUS_JAILED = 1;
    const STATUS_TRANFERRED = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prisoner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_JAILED],
            ['status', 'in', 'range' => [self::STATUS_JAILED, self::STATUS_RELEASED, self::STATUS_TRANFERRED]],
            [['prisoner_id'], 'required'],
            [['prisoner_id', 'age', 'visitor_id', 'status'], 'integer'],
            ['age', 'compare', 'compareValue' => 18, 'operator' => '>', 'message' => 'The age the prisoner must be greater than 18 years old.'],
            ['age', 'compare', 'compareValue' => 85, 'operator' => '<', 'message' => 'The age the prisoner must be less than 85 years old.'],

            [['entry_date', 'release_date'], 'safe'],
            [['case'], 'string'],
            [['first_name', 'last_name', 'sex', 'region', 'zone', 'woreda', 'kebele'], 'string', 'max' => 45],
            [['prisoner_id'], 'unique'],
            [['visitor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Visitors::class, 'targetAttribute' => ['visitor_id' => 'visitor_id']],
            [['age', 'entry_date', 'release_date', 'case',], 'required'],
            [['first_name', 'last_name', 'sex', 'region', 'zone', 'woreda', 'kebele'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prisoner_id' => 'Prisoner ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'sex' => 'Sex',
            'entry_date' => 'Entry Date',
            'release_date' => 'Release Date',
            'case' => 'Case',
            'region' => 'Region',
            'zone' => 'Zone',
            'woreda' => 'Woreda',
            'kebele' => 'Kebele',
            'visitor_id' => 'Visitor ID',

        ];
    }

    /**
     * Gets query for [[Cells]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCells()
    {
        return $this->hasMany(Cell::class, ['prisoner_id' => 'prisoner_id']);
    }

    /**
     * Gets query for [[Visitor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitor()
    {
        return $this->hasOne(Visitors::class, ['visitor_id' => 'visitor_id']);
    }

    /**
     * Gets query for [[Visitors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitors()
    {
        return $this->hasMany(Visitors::class, ['prisoner_id' => 'prisoner_id']);
    }
}
