<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Client $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mijozlar ro`yhati', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">
    <div class="card">
        <div class="card-body">


    <p>
        <?= Html::button('O`zgartirish', ['class' => 'btn btn-primary md-btnupdate','value'=>Yii::$app->urlManager->createUrl(['/cp/client/update', 'id' => $model->id])]) ?>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

            <div class="row">
                <div class="col-md-4">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            'phone',
                            'balance',
                            'source.name',
//                            'gender',
                            [
                                'attribute'=>'gender',
                                'value'=>function($model){
                                    return Yii::$app->params['gender'][$model->gender];
                                }
                            ],
                            'birthday',
//                            'address',
                            [
                                'attribute'=>'address',
                                'value'=>function($model){
                                    return $model->region->name.' '.$model->district->name.' '.$model->address;
                                }
                            ],
                            'group.name',
                            'description:ntext',

//                            'status',
                            [
                                'attribute'=>'status',
                                'value'=>function($model){
                                    return Yii::$app->params['status'][$model->status];
                                }
                            ],
                            'created',
                            'updated',
                            [
                                'attribute'=>'register_id',
                                'value'=>function($model){return $model->register->name;}
                            ],
                            [
                                'attribute'=>'modify_id',
                                'value'=>function($model){return $model->modify->name;}
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="col-md-8">

                </div>
            </div>

        </div>
    </div>
</div>
