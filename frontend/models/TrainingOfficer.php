<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "training_officer".
 *
 * @property int $to_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $sex
 * @property int|null $age
 * @property string|null $address
 *
 * @property Post[] $posts
 */
class TrainingOfficer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_officer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to_id'], 'required'],
            [['to_id', 'age'], 'integer'],
            [['first_name', 'last_name', 'sex', 'address'], 'string', 'max' => 45],
            [['to_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'to_id' => 'To ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sex' => 'Sex',
            'age' => 'Age',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['fk_to_id' => 'to_id']);
    }
}
