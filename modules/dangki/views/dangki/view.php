<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?><div class="container" style="background: #d0e6fd;">
    <div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'gender'=>[
                    'label'=>'Gender',
                    'value'=>function($data){
                        if($data->gender=='nam'){
                            return 'Nam';
                        }else{
                            return 'Nữ';
                        }
                    }
            ],
            'birthday' => [
                'label'  => 'Birthday',
                'value'  => function ($data) {
                    return date('F d, Y',strtotime($data->birthday));
                },

            ],
            'address',
            'email',
            'phone',
            'username',
        ],
    ]) ?>

    </div>
    </div>