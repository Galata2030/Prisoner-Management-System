<?php

use frontend\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer" || Yii::$app->user->identity->role == "Security Manager") {

            echo Html::a('Create Post', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'fk_guard_id',
            //'upload_date',
            'post_title',
            // 'post_description:ntext',
            // 'created_at',
            // 'created_by',
            [
                'format' => 'raw',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {

                        return Html::a('See more', ["post/view", 'post_id' => $data->post_id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    } else {
                        return Html::a('See more', ["post/view", 'post_id' => $data->post_id,], ['class' => 'btn btn-xs btn-warning glyphicon glyphicon-eye']);
                    }
                }
            ],

        ],
    ]); ?>


</div>