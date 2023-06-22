<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\TrainingOfficer $model */

$this->title = $model->to_id;
$this->params['breadcrumbs'][] = ['label' => 'Training Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="training-officer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'to_id' => $model->to_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'to_id' => $model->to_id], [
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
            'to_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            'address',
        ],
    ]) ?>

</div>
