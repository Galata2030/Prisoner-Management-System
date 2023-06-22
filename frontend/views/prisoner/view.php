<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Prisoner $model */

$this->title = $model->prisoner_id;
$this->params['breadcrumbs'][] = ['label' => 'Prisoners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prisoner-view">
    <div id="printButton" class="pull-right">
        <?php echo date('Y-M-d'); ?>
        <button type="button" name="print" class="btn btn-success btn-sm" onClick="printpage()">
            PRINT Clearance
            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
        </button>
    </div>
    <p>
        <?php
        if (Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Registrar Officer") {
            echo Html::a('Update', ['update', 'prisoner_id' => $model->prisoner_id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'prisoner_id' => $model->prisoner_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prisoner_id',
            'first_name',
            'last_name',
            'age',
            'sex',
            'entry_date',
            'release_date',
            'case:ntext',
            'region',
            'zone',
            'woreda',
            'kebele',
            'visitor_id',

        ],
    ]) ?>

</div>
<script type="text/javascript">
    function printpage() {
        document.getElementById('printButton').style.visibility = "hidden";
        window.print();
        document.getElementById('printButton').style.visibility = "visible";
    }
</script>