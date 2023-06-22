<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\Prisoner $model */
/** @var yii\widgets\ActiveForm $form */
$var_gender = ['M' => 'Male', 'F' => 'Female'];
?>
<style type="text/css">
    input[type=radio] {
        vertical-align: middle;
        float: right;
        width: 30px;
    }
</style>
<?php

$region = [
    'Tigray' => 'Tigray', 'Afar' => 'Afar', 'Amhara' => 'Amhara', 'Oromya' => 'Oromiya', "Gambella" => "Gambella", "Benshangul" => "Benshangul", "Somale" => "Somale",
    "SSNR" => "SSNR", "Sidama" => "Sidama", "Addis Ababa" => "Addis Ababa", "Dire Dawa" => "Dire Dawa", "Harari" => "Harari"
]
?>
<div class="prisoner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prisoner_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'sex')->radioList($var_gender) ?>

    <?= $form->field($model, 'entry_date')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter entry date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
            'endDate' => 'today'

        ]
    ]) ?>
    <?= $form->field($model, 'release_date')->widget(kartik\date\DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter release date ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'minuteStep' => 1,
            'todayHighlight' => true,
            'changeYear' => true,
            'changeMonth' => true,
            'startDate' => 'today',



        ]
    ]) ?>

    <?= $form->field($model, 'case')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'region')->dropDownList($region, ['prompt' => 'Please select']) ?>

    <?= $form->field($model, 'zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'woreda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kebele')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>