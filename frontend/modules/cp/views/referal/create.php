<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Referal $model */

$this->title = 'Create Referal';
$this->params['breadcrumbs'][] = ['label' => 'Referals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
