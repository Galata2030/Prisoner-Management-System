<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Guard $model */

$this->title = $model->guard_id;
$this->params['breadcrumbs'][] = ['label' => 'Guards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="guard-view">
    <p>
        <?= Html::a('Update', ['update', 'guard_id' => $model->guard_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'guard_id' => $model->guard_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'guard_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            'address',
        ],
    ]) ?>

</div>