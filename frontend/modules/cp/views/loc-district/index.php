<?php

use common\models\LocDistrict;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\LocDistrictSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Loc Districts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loc-district-index">

<div class="card">
    <div class="card-body">


    <p>
        <?= Html::button('Yaratish Loc District', ['class' => 'btn btn-success md-btncreate','value'=>Yii::$app->urlManager->createUrl(['create'])]) ?>
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
            'region_id',
            'name',
            'status',
            'created',
            //'updated',
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
