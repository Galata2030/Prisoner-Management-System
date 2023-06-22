<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleTraining $model */

$this->title = 'Create Schedule Training';
$this->params['breadcrumbs'][] = ['label' => 'Schedule Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-training-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>