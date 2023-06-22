<?php

use frontend\models\TrainingOfficer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\TrainingOfficerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Training Officers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-officer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Officer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'to_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrainingOfficer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'to_id' => $model->to_id]);
                 }
            ],
        ],
    ]); ?>


</div>
