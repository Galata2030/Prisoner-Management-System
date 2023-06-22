<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrarOfficer $model */

$this->title = 'Update Registrar Officer: ' . $model->ro_id;
$this->params['breadcrumbs'][] = ['label' => 'Registrar Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ro_id, 'url' => ['view', 'ro_id' => $model->ro_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registrar-officer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
