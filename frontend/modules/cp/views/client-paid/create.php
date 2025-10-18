<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ClientPaid $model */

$this->title = 'Create Client Paid';
$this->params['breadcrumbs'][] = ['label' => 'Client Paids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-paid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
