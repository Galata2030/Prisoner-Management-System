<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "registrar_officer".
 *
 * @property int $ro_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $sex
 * @property int|null $age
 * @property string|null $address
 *
 * @property Account[] $accounts
 * @property Post[] $posts
 */
class RegistrarOfficer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registrar_officer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ro_id'], 'required'],
            [['ro_id', 'age'], 'integer'],
            [['first_name', 'last_name', 'address'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'address', 'age', 'sex'], 'required'],
            [['sex'], 'string', 'max' => 10],
            [['ro_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ro_id' => 'Ro ID',
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
        return $this->hasMany(Account::class, ['ro_id' => 'ro_id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['fk_ro_id' => 'ro_id']);
    }
}
