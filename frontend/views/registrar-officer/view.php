<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrarOfficer $model */

$this->title = $model->ro_id;
$this->params['breadcrumbs'][] = ['label' => 'Registrar Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registrar-officer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ro_id' => $model->ro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ro_id' => $model->ro_id], [
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
            'ro_id',
            'first_name',
            'last_name',
            'sex',
            'age',
            'address',
        ],
    ]) ?>

</div>
