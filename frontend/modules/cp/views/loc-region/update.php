<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LocRegion $model */

$this->title = 'Update Loc Region: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Loc Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loc-region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
