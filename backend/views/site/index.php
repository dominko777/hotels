<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1>Забронированные номера</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'hotel_room_id',
                'value' => function ($model) {
                    return $model->hotelRoom->name;
                }
            ],
            'first_name',
            'phone',
            [
                'attribute' => 'day',
                'value' => 'day',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'day',
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
                'format' => 'html',
            ],
            [
                'attribute' => 'day_from',
                'value' => 'day_from',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'day_from',
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
                'format' => 'html',
            ],
            [
                'attribute' => 'day_to',
                'value' => 'day_to',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'day_to',
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
                'format' => 'html',
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i', $model->created_at);
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
