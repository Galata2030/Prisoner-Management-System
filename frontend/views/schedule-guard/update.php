<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleGuard $model */

$this->title = 'Update Schedule Guard: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedule Guards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-guard-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>