<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Guard $model */

$this->title = 'Create Guard';
$this->params['breadcrumbs'][] = ['label' => 'Guards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>