<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PostSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'post_id') ?>

    <?= $form->field($model, 'fk_admin_id') ?>

    <?= $form->field($model, 'fk_to_id') ?>

    <?= $form->field($model, 'fk_sm_id') ?>

    <?= $form->field($model, 'fk_ro_id') ?>

    <?php // echo $form->field($model, 'fk_guard_id') ?>

    <?php // echo $form->field($model, 'upload_date') ?>

    <?php // echo $form->field($model, 'post_title') ?>

    <?php // echo $form->field($model, 'post_description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
