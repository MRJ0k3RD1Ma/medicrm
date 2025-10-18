<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ClientType $model */

$this->title = 'O`zgartirish Client Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'O`zgartirish';
?>
<div class="client-type-update">

       <div class="card">
        <div class="card-body">
        <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
   


</div>
