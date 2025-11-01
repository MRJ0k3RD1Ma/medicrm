<?php

use common\models\OtherPaid;
use common\models\OtherPaidGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\OtherPaidSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Boshqa to`lovlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-paid-index">

<div class="card">
    <div class="card-body">


    <p>
        <?= Html::button('Boshqa to`lov qo`shish', ['class' => 'btn btn-success md-btncreate','value'=>Yii::$app->urlManager->createUrl(['/cp/other-paid/create'])]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'date',
                'value'=>function($d){
                    $url = Yii::$app->urlManager->createUrl(['/cp/other-paid/update','id'=>$d->id]);
                    return Html::button($d->date,['class'=>'btn btn-link md-btnupdate','value'=>$url]);
                },
                'format'=>'raw',
            ],
//            'price',
            [
                'attribute'=>'price',
                'value'=>function($d){
                    return number_format($d->price,2,'.',' ');
                }
            ],
            [
                'attribute'=>'group_id',
                'value'=>function($d){
                    return $d->group->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(OtherPaidGroup::find()->where(['status'=>1])->all(),'id','name'),
            ],
//            'type',
            [
                'attribute'=>'type',
                'value'=>function($d){
                    return '<b>'.Yii::$app->params['other-paid-type'][$d->type].'</b><br><div style="position: relative"><span class="oneline" data-full="'.$d->description.'">'.$d->description.'</span></div>';
                },
                'format'=>'raw',
                'filter'=>Yii::$app->params['other-paid-type'],
            ],
//            'group_id',

//            'description:ntext',
//            '',
            //'status',
            'created',
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
            [
                'label'=>'',
                'format'=>'raw',
                'value'=>function($d){
                    $url = Yii::$app->urlManager->createUrl(['/cp/other-paid/delete','id'=>$d->id]);
                    return Html::a('<span class="fa fa-trash"></span>',$url,['class'=>'btn btn-danger','data-method'=>'post','data-confirm'=>'Siz rostdan ham ushbu elementni o`chirmoqchimisiz?']);
                }
            ],
        ],
    ]); ?>


    </div>
</div>
</div>

<style>
    .oneline{
        flex: 1 1 auto;       /* kengayadi, qolgan joyni oladi */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        display: block;
        line-height: 1.4;
        max-width: 250px;
        word-break: normal; /* so'zlarni kesishni nazorat qilish */
        transition: max-height 0.25s ease; /* ixtiyoriy vizual yumshatuvchi effekt */
    }
    /* tooltip stili (hoverda paydo bo'ladi) */
    .oneline[data-full]:hover::after{
        content: attr(data-full);
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 100%; /* element ustida paydo bo'ladi */
        margin-bottom: 8px;
        white-space: normal; /* ko'pi bilan yangi qatorlarga o'tsin */
        max-width: 400px; /* tooltip kengligi */
        width:300px;
        padding: 8px 10px;
        border-radius: 6px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
        background: #222;
        color: #fff;
        font-size: 13px;
        line-height: 1.3;
        z-index: 9999;
    }

    /* kichik uchburchak (tooltip ostida) */
    .oneline[data-full]:hover::before{
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 100%;
        margin-bottom: 2px;
        border-width: 6px;
        border-style: solid;
        border-color: transparent transparent #222 transparent;
        z-index: 9999;
    }
    @media (hover: none){
        .oneline[data-full]:active::after,
        .oneline[data-full]:active::before{ display: block; }
    }
</style>