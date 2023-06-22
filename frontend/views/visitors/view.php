<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Visitors $model */

$this->title = $model->visitor_id;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="visitors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'visitor_id' => $model->visitor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'visitor_id' => $model->visitor_id], [
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
            'visitor_id',
            'prisoner_id',
            'first_name',
            'last_name',
            'sex',
            'address',
            'phone_no',
        ],
    ]) ?>

</div>
