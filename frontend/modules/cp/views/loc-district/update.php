<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LocDistrict $model */

$this->title = 'Update Loc District: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Loc Districts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loc-district-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
