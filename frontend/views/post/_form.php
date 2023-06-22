<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter End date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
            'startDate' => 'today',
            'endDate' => 'today'

        ]
    ]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>