<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleGuard $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedule Guards', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="schedule-guard-view">

    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Security Manager") {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'start_date',
            'end_date',
            'guard_id',
            'trainer_name',
        ],
    ]) ?>

</div>