<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "security_manager".
 *
 * @property int $sm_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $sex
 * @property int|null $age
 * @property string|null $address
 *
 * @property Account[] $accounts
 * @property Post[] $posts
 */
class SecurityManager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'security_manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sm_id'], 'required'],
            [['sm_id', 'age'], 'integer'],
            [['first_name', 'last_name', 'address'], 'string', 'max' => 45],
            [['sex'], 'string', 'max' => 10],
            [['sm_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sm_id' => 'Sm ID',
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
        return $this->hasMany(Account::class, ['sm_id' => 'sm_id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['fk_sm_id' => 'sm_id']);
    }
}
