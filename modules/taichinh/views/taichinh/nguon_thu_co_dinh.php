<?php
use kartik\form\ActiveForm;
use yii\helpers\Html;
use kartik\money\MaskMoney;
$this->title='Quản lý thu nhập';
?>
<div class="container" style="background: #d0e6fd;">
    <div id="nguon_thu_co_dinh_form" style="max-width: 500px;margin: auto;">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model,'nguon_thu',['addon'=>['append'=>['content'=>'VND']]])->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'allowMinus'=>false,
            'groupSize'=>3,
            'radixPoint'=> ".",
            'groupSeparator' => ',',
            'autoGroup' => true,
            'removeMaskOnSubmit' => true
        ]
        ]);?>

            <div class="form-group">
            <button class="btn btn-success" >Lưu</button>
        </div>
        <?php $form=ActiveForm::end();?>
    </div>
</div>