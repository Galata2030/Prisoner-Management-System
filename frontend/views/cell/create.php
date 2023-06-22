<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Cell $model */

$this->title = 'Create Cell';
$this->params['breadcrumbs'][] = ['label' => 'Cells', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cell-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
