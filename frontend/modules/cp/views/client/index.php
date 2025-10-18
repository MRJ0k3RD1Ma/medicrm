<?php

use common\models\Client;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ClientSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

<div class="card">
    <div class="card-body">


    <p>
        <?= Html::button('Yaratish Client', ['class' => 'btn btn-success md-btncreate','value'=>Yii::$app->urlManager->createUrl(['create'])]) ?>
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
            'name',
            'phone',
            'group_id',
            'gender',
            //'birthday',
            //'region_id',
            //'district_id',
            //'address',
            //'balance',
            //'description:ntext',
            //'source_id',
            //'status',
            //'created',
            //'updated',
            //'register_id',
            //'modify_id',
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
