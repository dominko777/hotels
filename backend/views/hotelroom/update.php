<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HotelRoom */

$this->title = 'Update Hotel Room: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
