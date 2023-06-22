<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Post;

/** @var yii\web\View $this */
/** @var frontend\models\Post $model */

$this->title = "Post View";
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="post-view">
    <p class='text-muted'>
        <small>Created At: <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></br>
            By: <?php
                echo $model->created_by;
                ?>
        </small>

    </p>
    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {
            echo Html::a('Update', ['update', 'post_id' => $model->post_id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'post_id' => $model->post_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'post_id',
            // 'fk_admin_id',
            // 'fk_to_id',
            // 'fk_sm_id',
            // 'fk_ro_id',
            // 'fk_guard_id',
            // 'upload_date',
            'post_title',
            'post_description:ntext',
            // 'created_at',
            // 'created_by',
        ],
    ]) ?>

</div>