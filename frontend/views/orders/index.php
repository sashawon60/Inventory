<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],

            //'order_id',
            //'user_id',
            [
                'label' => 'User Name',
                'value' => function ($data){ return $data->user->username; },
            ],
            'order_no',
            //'total_price',

            [
                'label' => 'Total Price',
                'attribute' => 'total_price',
                'value' => function ($data){ return $data->total_price." ৳"; },
            ],

            [
                'label' => 'Paid Amount',
                'attribute' => 'total_paid',
                'value' => function ($data){ return $data->total_paid." ৳"; },
            ],

            //'total_paid',
            // 'status',
            //'created_at',
            //'updated_at',


            [
                'label' => 'Payment',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a('Payment',
                        Url::to(['invoice/create', 'id' => $data->order_id]),
                        ['class' => 'btn btn-sm btn-success']
                    );
                },
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->user_type=='admin',
            ],

            ['class' => 'yii\grid\ActionColumn'],


        ],
    ]); ?>


</div>
