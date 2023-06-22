<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $post_id
 * @property int|null $fk_admin_id
 * @property int|null $fk_to_id
 * @property int|null $fk_sm_id
 * @property int|null $fk_ro_id
 * @property int|null $fk_guard_id
 * @property string|null $upload_date
 * @property string|null $post_title
 * @property string|null $post_description
 * @property int|null $created_at
 * @property int|null $created_by
 *
 * @property Admin $fkAdmin
 * @property Guard $fkGuard
 * @property RegistrarOfficer $fkRo
 * @property SecurityManager $fkSm
 * @property TrainingOfficer $fkTo
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_admin_id', 'fk_to_id', 'fk_sm_id', 'fk_ro_id', 'fk_guard_id'], 'integer'],
            [['upload_date', 'created_at'], 'safe'],
            [['post_description'], 'string'],
            [['post_title'], 'string', 'max' => 100],
            [['post_title', 'created_by', 'upload_date', 'post_description'], 'required'],
            [['created_by'], 'string', 'max' => 45],
            [['fk_admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::class, 'targetAttribute' => ['fk_admin_id' => 'admin_id']],
            [['fk_guard_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guard::class, 'targetAttribute' => ['fk_guard_id' => 'guard_id']],
            [['fk_ro_id'], 'exist', 'skipOnError' => true, 'targetClass' => RegistrarOfficer::class, 'targetAttribute' => ['fk_ro_id' => 'ro_id']],
            [['fk_sm_id'], 'exist', 'skipOnError' => true, 'targetClass' => SecurityManager::class, 'targetAttribute' => ['fk_sm_id' => 'sm_id']],
            [['fk_to_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingOfficer::class, 'targetAttribute' => ['fk_to_id' => 'to_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'fk_admin_id' => 'Fk Admin ID',
            'fk_to_id' => 'Fk To ID',
            'fk_sm_id' => 'Fk Sm ID',
            'fk_ro_id' => 'Fk Ro ID',
            'fk_guard_id' => 'Fk Guard ID',
            'upload_date' => 'Upload Date',
            'post_title' => 'Post Title',
            'post_description' => 'Post Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[FkAdmin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkAdmin()
    {
        return $this->hasOne(Admin::class, ['admin_id' => 'fk_admin_id']);
    }

    /**
     * Gets query for [[FkGuard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkGuard()
    {
        return $this->hasOne(Guard::class, ['guard_id' => 'fk_guard_id']);
    }

    /**
     * Gets query for [[FkRo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkRo()
    {
        return $this->hasOne(RegistrarOfficer::class, ['ro_id' => 'fk_ro_id']);
    }

    /**
     * Gets query for [[FkSm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkSm()
    {
        return $this->hasOne(SecurityManager::class, ['sm_id' => 'fk_sm_id']);
    }

    /**
     * Gets query for [[FkTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkTo()
    {
        return $this->hasOne(TrainingOfficer::class, ['to_id' => 'fk_to_id']);
    }
}
