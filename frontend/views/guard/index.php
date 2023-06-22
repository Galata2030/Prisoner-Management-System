<?php

use frontend\models\Guard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\GuardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Guards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guard-index">

    <p>
        <?= Html::a('Create Guard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'guard_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Guard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'guard_id' => $model->guard_id]);
                }
            ],
        ],
    ]); ?>


</div>