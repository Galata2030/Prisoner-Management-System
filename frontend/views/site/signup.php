<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?php
            $idd = 1;
            $var = ArrayHelper::map(
                common\models\Valulist::find()->where(['index' => $idd])->all(),
                'value',
                function ($model) {
                    return $model['value'];
                }
            );
            ?>
            <?= $form->field($model, 'role')->widget(Select2::classname(), [
                'data' => $var,
                'options' => ['placeholder' => 'Select  Unit ...'],
                'pluginOptions' => [
                    'depends' => [''],
                    'url' => Url::to(['#'])
                ],
            ]); ?>
            <div class="form-group">
                <?= Html::submitButton('create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>