<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ClientGroup $model */

$this->title = 'Create Client Group';
$this->params['breadcrumbs'][] = ['label' => 'Client Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
