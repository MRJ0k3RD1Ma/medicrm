<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Visit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: block">
        <?= $form->field($model, 'client_id')->textInput() ?>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'departament_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Departament::find()->where(['status'=>1])->all(),'id','name'),['prompt'=>'']) ?>

        </div>
        <div class="col-md-6">

        </div>
    </div>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'is_emergency')->textInput() ?>

    <?= $form->field($model, 'emergency_car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_onetime_payment')->textInput() ?>

    <?= $form->field($model, 'visit_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
