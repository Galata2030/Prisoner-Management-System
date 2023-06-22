<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\SecurityManager $model */

$this->title = 'Update Security Manager: ' . $model->sm_id;
$this->params['breadcrumbs'][] = ['label' => 'Security Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sm_id, 'url' => ['view', 'sm_id' => $model->sm_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="security-manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
