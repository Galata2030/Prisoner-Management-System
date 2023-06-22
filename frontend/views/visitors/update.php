<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Visitors $model */

$this->title = 'Update Visitors: ' . $model->visitor_id;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visitor_id, 'url' => ['view', 'visitor_id' => $model->visitor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visitors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
