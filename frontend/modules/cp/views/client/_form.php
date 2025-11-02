<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Client $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(Yii::$app->params['gender'], ['prompt' => '']) ?>

    <?= $form->field($model, 'birthday')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\LocRegion::find()->where(['status'=>1])->all(),'id','name'),['prompt'=>'']) ?>

    <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\LocDistrict::find()->where(['status'=>1])->andWhere(['region_id'=>$model->region_id])->all(),'id','name')) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'source_id')->radioList(\yii\helpers\ArrayHelper::map(\common\models\Source::find()->where(['status'=>1])->all(),'id','name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$url = Yii::$app->urlManager->createUrl(['/cp/client/get-district-by-region-id']);
$this->registerJs("
    $('#client-region_id').change(function(){
        $.get('$url?id='+$(this).val(),function(data){
            $('#client-district_id').empty();
            $('#client-district_id').append(data);
        })
    })
");

?>