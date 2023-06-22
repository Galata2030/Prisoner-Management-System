<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "guard".
 *
 * @property int $guard_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $sex
 * @property int|null $age
 * @property string|null $address
 *
 * @property Account[] $accounts
 * @property Post[] $posts
 */
class Guard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guard_id'], 'required'],
            [['guard_id', 'age'], 'integer'],
            [['first_name', 'last_name', 'sex', 'address'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'sex', 'address', 'age'], 'required'],
            [['guard_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guard_id' => 'Guard ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sex' => 'Sex',
            'age' => 'Age',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Accounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['guard_id' => 'guard_id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['fk_guard_id' => 'guard_id']);
    }
}
