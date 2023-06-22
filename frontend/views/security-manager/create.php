<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\SecurityManager $model */

$this->title = 'Create Security Manager';
$this->params['breadcrumbs'][] = ['label' => 'Security Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
