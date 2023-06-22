<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Cell $model */

$this->title = $model->block_id;
$this->params['breadcrumbs'][] = ['label' => 'Cells', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cell-view">
    <p>
        <?= Html::a('Update', ['update', 'block_id' => $model->block_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'block_id' => $model->block_id], [
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
            'block_id',
            'prisoner_id',
            'bed_no',
            'dorm_no',
        ],
    ]) ?>

</div>