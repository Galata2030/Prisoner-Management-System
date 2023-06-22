<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Prisoner $model */

$this->title = 'Update Prisoner: ' . $model->prisoner_id;
$this->params['breadcrumbs'][] = ['label' => 'Prisoners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prisoner_id, 'url' => ['view', 'prisoner_id' => $model->prisoner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prisoner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
