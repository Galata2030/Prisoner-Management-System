<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\RegistrarOfficer $model */

$this->title = 'Create Registrar Officer';
$this->params['breadcrumbs'][] = ['label' => 'Registrar Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrar-officer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
