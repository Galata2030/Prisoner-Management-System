<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleGuard $model */

$this->title = 'Create Schedule Guard';
$this->params['breadcrumbs'][] = ['label' => 'Schedule Guards', 'url' => ['index']];
?>
<div class="schedule-guard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>