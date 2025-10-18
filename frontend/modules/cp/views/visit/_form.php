<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Visit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'departament_id')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'state')->dropDownList([ 'NEW' => 'NEW', 'RUNNING' => 'RUNNING', 'DONE' => 'DONE', 'CANCALLED' => 'CANCALLED', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'register_id')->textInput() ?>

    <?= $form->field($model, 'modify_id')->textInput() ?>

    <?= $form->field($model, 'is_emergency')->textInput() ?>

    <?= $form->field($model, 'emergency_car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_onetime_payment')->textInput() ?>

    <?= $form->field($model, 'visit_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
