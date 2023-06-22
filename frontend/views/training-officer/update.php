<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TrainingOfficer $model */

$this->title = 'Update Training Officer: ' . $model->to_id;
$this->params['breadcrumbs'][] = ['label' => 'Training Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->to_id, 'url' => ['view', 'to_id' => $model->to_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="training-officer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
