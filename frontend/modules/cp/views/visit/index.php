<?php

use common\models\Visit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\VisitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

<div class="card">
    <div class="card-body">


    <p>
        <?= Html::button('Yaratish Visit', ['class' => 'btn btn-success md-btncreate','value'=>Yii::$app->urlManager->createUrl(['create'])]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'value'=>function($d){
                    $url = Yii::$app->urlManager->createUrl(['view','id'=>$d->id]);
                    return Html::a($d->id,$url);
                },
                'format'=>'raw',
            ],
            'id',
            'client_id',
            'departament_id',
            'price',
            'description:ntext',
            //'state',
            //'status',
            //'created',
            //'updated',
            //'register_id',
            //'modify_id',
            //'is_emergency',
            //'emergency_car',
            //'is_onetime_payment:datetime',
            //'visit_date',
            [
                'attribute'=>'status',
                'value'=>function($d){
                    return Yii::$app->params['status'][$d->status];
                },
                'filter'=>Yii::$app->params['status'],
            ],
        ],
    ]); ?>


    </div>
</div>
</div>
