<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TrainingOfficer $model */

$this->title = 'Create Training Officer';
$this->params['breadcrumbs'][] = ['label' => 'Training Officers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-officer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
