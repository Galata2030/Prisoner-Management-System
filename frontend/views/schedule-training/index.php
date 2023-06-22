<?php

use frontend\models\ScheduleTraining;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ScheduleTrainingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Schedule Trainings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-training-index">
    <div id="printButton" class="pull-right">
        <?php echo date('Y-M-d'); ?>
        <button type="button" name="print" class="btn btn-success btn-sm" onClick="printpage()">
            PRINT
            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
        </button>
    </div>

    <p>
        <?php
        if (Yii::$app->user->identity->role == 'Training Officer' || Yii::$app->user->identity->role == 'Admin') {
            echo Html::a('Create Schedule Training', ['create'], ['class' => 'btn btn-success']);
        } ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            // 'training_duration',
            // 'prisoner_id',
            //'training_course',
            [
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Training Officer") {

                        return Html::a('See more', ["schedule-training/view", 'id' => $data->id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    } else {
                        return Html::a('See more', ["schedule-training/view", 'id' => $data->id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    }
                }
            ],
        ],
    ]); ?>


</div>
<script type="text/javascript">
    function printpage() {
        document.getElementById('printButton').style.visibility = "hidden";
        window.print();
        document.getElementById('printButton').style.visibility = "visible";
    }
</script>