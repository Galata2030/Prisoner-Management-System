<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrarOfficer $model */
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

<div class="registrar-officer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ro_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->radioList($var_gender) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>