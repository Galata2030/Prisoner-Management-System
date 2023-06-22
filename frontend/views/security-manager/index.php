<?php

use frontend\models\SecurityManager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\SecurityManagerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Security Managers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-manager-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Security Manager', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sm_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SecurityManager $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sm_id' => $model->sm_id]);
                 }
            ],
        ],
    ]); ?>


</div>
