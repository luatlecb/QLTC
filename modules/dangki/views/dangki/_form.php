<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\dangki\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(['nam'=>'Nam','nu'=>'Nữ'],['prompt'=>'Chọn giới tính']) ?>

    <!-- --><?/*= $form->field($model, 'birthday')->textInput(['maxlength' => true]) */?>
    <?= $form->field($model, 'birthday')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email',['enableAjaxValidation' => $model->isNewRecord ? true : false])->textInput(['maxlength' => true,'readonly'=>$model->isNewRecord ? false:true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username',['enableAjaxValidation' => $model->isNewRecord ? true : false])->textInput(['maxlength' => true,'readonly'=>$model->isNewRecord ? false:true]) ?>

    <? echo  $form->field($model, 'password',['addon' => ['append' => ['content'=>'<span id= "show_password"><span class="glyphicon glyphicon-eye-open"></span></span>']]])->passwordInput(['maxlength' => true,'value'=>'']); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Đăng kí' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>