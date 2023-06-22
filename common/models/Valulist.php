<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "valulist".
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $index
 */
class Valulist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'valulist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index'], 'integer'],
            [['value'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'index' => 'Index',
        ];
    }
}
