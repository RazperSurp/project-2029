<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'edit-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'type_id') ?>
    <?= $form->field($model, 'supplier_id') ?>
    <?= $form->field($model, 'warehouse_id') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'count') ?>
    <?= $form->field($model, 'price') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>