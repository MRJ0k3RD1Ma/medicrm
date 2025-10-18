<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LocDistrict $model */

$this->title = 'Create Loc District';
$this->params['breadcrumbs'][] = ['label' => 'Loc Districts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loc-district-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
