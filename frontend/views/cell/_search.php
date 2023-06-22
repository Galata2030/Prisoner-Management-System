<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\CellSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cell-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'block_id') ?>

    <?= $form->field($model, 'prisoner_id') ?>

    <?= $form->field($model, 'bed_no') ?>

    <?= $form->field($model, 'dorm_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
