<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dangki\models\Users */

$this->title = 'Cập nhật : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
if(isset($_SESSION['password'])){
    echo $_SESSION['password'];
}
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">
    <div class="container" style="background: #d0e6fd;">
        <div class="users-create" style="max-width: 500px;margin: auto;">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php echo $this->render('_form',['model'=>$model])?>
        </div>
    </div>
</div>
<?php
$url=Yii::$app->request->baseUrl.'/assets/dangki';
$this->registerJsFile($url.'/js/dangki.js',$this->endBody());
?>

