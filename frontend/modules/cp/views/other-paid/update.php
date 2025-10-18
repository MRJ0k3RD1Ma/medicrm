<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OtherPaid $model */

$this->title = 'Update Other Paid: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Other Paids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="other-paid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
