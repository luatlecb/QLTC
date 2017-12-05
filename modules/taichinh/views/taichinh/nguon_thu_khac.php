<?php
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title='Thu nhập khác';
?>
<div class="container" style="background: #d0e6fd;">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="message_save">

    </div>
    <div id="nguon_thu_khac_form">
        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
        <?= GridView::widget([
            'dataProvider' => $data1,
            'tableOptions'=>['class'=>'table table-striped table-hover NT-khac'],
            'layout' => "{summary}<div align='right' id='page_NT-khac'>{pager}</div>\n{items}",
            'columns' => [
                'name'=>[
                    'attribute'=>'name',
                    'headerOptions' => ['class'=>'col-NT-khac'],
                ],
                'total'=>[
                    'attribute'=>'total',
                    'value'=>function($data){
                        return number_format($data->total);
                    }

                ],
                'date_created',
                [
                        'format' => 'raw',
                        'value'=>function($data){
                            return '<a onclick="delete_nguon_thu_khac('.$data->id.',\''.$data->name.'\')" href="#" style="font-size: 16px;">Xóa</a>';
                        }
                ]
            ],
        ]) ?>
        <?php Pjax::end(); ?>
        <?php $form = ActiveForm::begin(['id'=>'form-NT-khac']); ?>
        <div class="row" style="background: #6c88ad;">
            <div class="col-md-4">
                <?= $form->field($model,'name')->textInput(['max'=>255,'placeholder'=>'Nhập tên khoản thu'])->label('',['class'=>'input-nt-khac'])?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model,'total',['addon'=>['append'=>['content'=>'VND']]])->widget(\yii\widgets\MaskedInput::className(), [
                    'clientOptions' => [
                        'alias' => 'numeric',
                        'allowMinus'=>false,
                        'groupSize'=>3,
                        'radixPoint'=> ".",
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,

                    ],
                    'options'=>[
                            'class'=>'form-control NT-total',
                            'id'=>'NT-total',
                            'placeholder'=>'Nhập tổng số tiền'

                    ]
                ])->label('',['class'=>'input-nt-khac']);?>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success" style="margin-top: 15px;" type="button" onclick="add_nguon_thu();">Thêm mới</button>
            </div>
        </div>
        <?php $form=ActiveForm::end();?>
    </div>
</div>
<?php
$url=Yii::$app->request->baseUrl.'/assets/nguonthu';
$this->registerJsFile($url.'/js/nguonthu.js',$this->endBody());
$this->registercssFile($url.'/css/nguonthu.css',$this->beginBody());

?>
