<?php
use kartik\form\ActiveForm;
use yii\helpers\Html;
$this->title = "Đăng nhập";
?>
<div class="container" style="background: #d0e6fd;">
    <div style="max-width: 500px;margin: auto;">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Đăng nhập', ['class' =>'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>