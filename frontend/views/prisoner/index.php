<?php

use frontend\models\Prisoner;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PrisonerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = "Prisoners";
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="printButton" class="pull-right">
    <?php echo date('Y-M-d'); ?>
    <button type="button" name="print" class="btn btn-success btn-sm" onClick="printpage()">
        PRINT
        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
    </button>
</div>
<script type="text/javascript">
    function printpage() {
        document.getElementById('printButton').style.visibility = "hidden";
        window.print();
        document.getElementById('printButton').style.visibility = "visible";
    }
</script>
<div class="prisoner-index">
    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {

            echo Html::a('Register New Prisoner', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>
    <p>
        <?php
        echo Html::a('See Report', ['report'], ['class' => 'btn btn-success']);

        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'prisoner_id',
            'first_name',
            'last_name',
            'age',
            'sex',
            'region',
            //'entry_date',
            //'release_date',
            'status',
            [
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {

                        return Html::a('See more', ["prisoner/view", 'prisoner_id' => $data->prisoner_id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    } else {
                        return Html::a('See more', ["prisoner/view", 'prisoner_id' => $data->prisoner_id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    }
                }
            ],
            [
                'format' => 'raw',
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {
                        return  Html::a(
                            'Release',
                            ["prisoner/released", 'prisoner_id' => $data->prisoner_id,],
                            ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to release this prisoner?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                    } else {
                        return "";
                    }
                }
            ],
            [

                'format' => 'raw',
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {
                        return  Html::a(
                            'Transfer',
                            ["prisoner/transferred", 'prisoner_id' => $data->prisoner_id,],
                            ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to release this prisoner?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                    } else {
                        return "";
                    }
                }

            ],
        ],
    ]); ?>


</div>
<style>
    table {
        border-collapse: collapse;
        width: 75%;
        align-items: center;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #DDD;
    }

    tr:hover {
        background-color: #D6EEEE;
    }

    caption {
        text-align: center;
        caption-side: top;
        color: blue;
    }

    /* Styles for the page */
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #333;
    }

    p {
        color: #666;
    }

    /* Styles for printing */
    @media print {
        body {
            font-size: 12pt;
            transform: scale(0.3);
            /* Adjust the scale as needed */
            /* transform-origin: center; */
        }

        h1 {
            color: #000;
        }

        p {
            color: #000;
        }
    }
</style>