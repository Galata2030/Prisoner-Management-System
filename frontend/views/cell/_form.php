<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Cell $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cell-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'block_id')->textInput() ?>

    <?= $form->field($model, 'prisoner_id')->textInput() ?>

    <?= $form->field($model, 'bed_no')->textInput() ?>

    <?= $form->field($model, 'dorm_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
