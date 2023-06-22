<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Cell $model */

$this->title = 'Update Cell: ' . $model->block_id;
$this->params['breadcrumbs'][] = ['label' => 'Cells', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->block_id, 'url' => ['view', 'block_id' => $model->block_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cell-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
