<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Guard $model */

$this->title = 'Update Guard: ' . $model->guard_id;
$this->params['breadcrumbs'][] = ['label' => 'Guards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->guard_id, 'url' => ['view', 'guard_id' => $model->guard_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guard-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>