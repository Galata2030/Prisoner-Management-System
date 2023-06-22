<?php

use frontend\models\ScheduleGuard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleGuardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Schedule Guards';
?>
<div class="schedule-guard-index">

    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Security Manager") {

            echo Html::a('Create New Schedule', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'start_date',
            'end_date',
            'guard_id',
            'trainer_name',
            [
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Security Manager") {

                        return Html::a('See more', ["schedule-guard/view", 'id' => $data->id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    } else {
                        return Html::a('See more', ["schedule-guard/view", 'id' => $data->id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    }
                }
            ]
        ],
    ]); ?>


</div>