<?php

use frontend\models\Cell;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\CellSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cells';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cell-index">

    <p>
        <?= Html::a('Create Cell', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'block_id',
            'prisoner_id',
            'bed_no',
            'dorm_no',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cell $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'block_id' => $model->block_id]);
                }
            ],
        ],
    ]); ?>


</div>