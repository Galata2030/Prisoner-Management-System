<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */

?><br>
<div class="panel-heading">

    <body>
        <legend><span class="number"></span> <b>Change Password<h3 style="color:blue">
                    <?= Html::encode("For User" . ":- " . Yii::$app->user->identity->first_name . " " . Yii::$app->user->identity->last_name) ?>
                </h3></b>
        </legend>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-2 col-lg-9\">{error}\n{hint}</div>",
                'labelOptions' => ['class' => 'col-lg-3 control-label']
            ],
        ]); ?>
        <div class="row">
            <div class="col-lg-10">
                <?= $form->field($model, 'newpassword')->passwordInput(['placeholder' => " Enter new password", 'required' => 'required']) ?>
                <?= $form->field($model, 'confirm_pass')->passwordInput(['placeholder' => "Confirm password", 'required' => 'required']) ?>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="col-lg-6 col-md-6 col-sm-6">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <?= Html::submitButton('Change Password', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
</div>
</div>
</body>
</div>