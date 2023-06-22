<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleTraining $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-training-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'training_duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prisoner_id')->textInput() ?>

    <?= $form->field($model, 'training_course')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'trainer_name')->textInput() ?>
    <?= $form->field($model, 'start_date')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter start date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd' . ';' . date('H:m:s'),
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
            'startDate' => 'today',
        ]
    ]) ?>
    <?= $form->field($model, 'end_date')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter end date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd' . ';' . date('H:m:s'),
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
            'startDate' => 'today',
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">