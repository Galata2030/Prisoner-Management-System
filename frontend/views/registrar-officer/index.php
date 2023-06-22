<?php

use frontend\models\RegistrarOfficer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrarOfficerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registrar Officers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrar-officer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registrar Officer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ro_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RegistrarOfficer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ro_id' => $model->ro_id]);
                }
            ],
        ],
    ]); ?>


</div>