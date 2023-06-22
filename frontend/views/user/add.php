<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'PMS';
$this->params['breadcrumbs'][] = ['label' => 'Back', 'url' => ['site/index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">
    <?= $this->render('change', [
        'model' => $model,
    ]) ?>

</div>