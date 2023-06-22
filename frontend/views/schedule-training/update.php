<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleTraining $model */

$this->title = 'Update Schedule Training: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedule Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-training-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
