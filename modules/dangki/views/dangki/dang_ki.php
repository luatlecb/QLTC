<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\dangki\models\Users */

$this->title = "Đăng kí";
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="background: #d0e6fd;">
    <div class="users-create" style="max-width: 500px;margin: auto;">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php echo $this->render('_form',['model'=>$model])?>
    </div>
</div>
<?php
$url=Yii::$app->request->baseUrl.'/assets/dangki';
$this->registerJsFile($url.'/js/dangki.js',$this->endBody());
?>
