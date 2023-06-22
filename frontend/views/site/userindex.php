<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
//use kartik\grid\GridView;
/** @var yii\web\View $this */
/** @var frontend\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Acconts';

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            'role',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],

            [
                'header' => 'Action ',
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style', 'style' => 'background-color:green;'],
                'value' => function ($data) {
                    if ($data->status == " ") {
                        return Html::a('Activate', ["user/activate", 'id' => $data->id,], [
                            'class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open',

                            'data' => [
                                'method' => 'post',
                                'confirm' => \Yii::t('yii', 'Are you sure you want to Activate this item?')

                            ], 'url' => ['activate', 'id' => $data->id],
                            'visible' => false,   // same as above
                        ])
                            . " "
                            . Html::a('De-activate', ["user/deactivate", 'id' => $data->id,], ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock']);
                    }
                    if ($data->status == 10) {
                        return  Html::a(
                            'De-activate',
                            ["user/deactivate", 'id' => $data->id,],
                            ['class' => 'btn btn-xs btn-danger glyphicon glyphicon-lock'],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to deactivate this item?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                    }
                    if ($data->status == 9) {
                        return Html::a('Activate', ["user/activate", 'id' => $data->id,], ['class' => 'btn btn-xs btn-sucess glyphicon glyphicon-open']);
                    }
                }
            ],


        ],
    ]); ?>

</div>