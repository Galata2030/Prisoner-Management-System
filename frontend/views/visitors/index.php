<?php

use frontend\models\Visitors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\VisitorsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Visitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Visitors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'visitor_id',
            'prisoner_id',
            'first_name',
            'last_name',
            'sex',
            //'address',
            //'phone_no',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Visitors $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'visitor_id' => $model->visitor_id]);
                 }
            ],
        ],
    ]); ?>


</div>
