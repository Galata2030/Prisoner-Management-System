<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Prisoner $model */

$this->title = 'Create Prisoner';
$this->params['breadcrumbs'][] = ['label' => 'Prisoners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prisoner-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>