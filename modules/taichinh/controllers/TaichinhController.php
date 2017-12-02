<?php

namespace app\modules\taichinh\controllers;

use app\modules\taichinh\models\taiChinh;
use Yii;
use yii\filters\VerbFilter;


class TaichinhController extends \yii\web\Controller
{

    public function actionIndex()
    {
        if(!isset($_SESSION['user'])||$_SESSION['user']->id==''){
            $this->goHome();
        }else{
            $taichinh= new taiChinh();
            $detail=$taichinh->getNguonThu($this->getID());
            if($detail==array()){
                return $this->redirect('nguonthu');
            }else{
                return $this->render('index',['model'=>$detail]);
            }
        }
    }
    public function actionNguonthu(){
        $model=new taiChinh();
        if($model->load(Yii::$app->request->post())){
            $model->user_id=$this->getID();
            $model->so_du=$model->nguon_thu;
            if($model->save()){
                return $this->redirect('nguonthukhac');
            }else{
                print_r($model->getErrors());
            }
        }else{
            return $this->render('nguon_thu_co_dinh',['model'=>$model]);
        }

    }
    public function actionNguonthukhac(){
        return $this->render('nguon_thu_khac',['user_id'=>$this->getID()]);
    }


}
