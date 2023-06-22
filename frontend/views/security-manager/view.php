<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\SecurityManager $model */

$this->title = $model->sm_id;
$this->params['breadcrumbs'][] = ['label' => 'Security Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="security-manager-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sm_id' => $model->sm_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sm_id' => $model->sm_id], [
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
            'sm_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            'address',
        ],
    ]) ?>

</div>
