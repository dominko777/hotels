<?php

use borales\extensions\phoneInput\PhoneInput;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <div class="site-index">

        <h1>Заказ номера</h1>

        <div class="booking-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php
            $authors = \common\models\HotelRoom::find()->all();
            $items = ArrayHelper::map($authors, 'id', 'name');
            $params = [
                'prompt' => 'Выберите номер'
            ];
            echo $form->field($model, 'hotel_room_id')->dropDownList($items, $params);
            ?>

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'day', [
                'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
                'options' => ['class' => 'drp-container form-group']
            ])->widget(DateRangePicker::classname(), [
                'useWithAddon' => true,
                'pluginOptions' => [
                    'singleDatePicker' => true,
                    'showDropdowns' => true,
                ]
            ]);
            ?>

            <?= $form->field($model, 'fromToDayInterval', [
                'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
                'options' => ['class' => 'drp-container form-group']
            ])->widget(DateRangePicker::classname(), [
                'useWithAddon' => true,
            ]);
            ?>

            <?= $form->field($model, 'phone')->widget(PhoneInput::className()); ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
<?php
$script = <<<JS
$('#booking-day').on('change', function(ev) {
  $('#booking-fromtodayinterval').val('');
});
$('#booking-fromtodayinterval').on('change', function(e) {
  $('#booking-day').val('');
});
JS;
$this->registerJs($script, yii\web\View::POS_READY);