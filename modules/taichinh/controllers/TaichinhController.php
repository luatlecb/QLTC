<?php

namespace app\modules\taichinh\controllers;
use app\modules\taichinh\models\taiChinh;
use app\modules\taichinh\models\ThuNhapKhac;
use app\modules\taichinh\models\ThunhapkhacSearch;
use Yii;
use app\modules\taichinh\models\taichinhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TaichinhController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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


    protected function findModel($id)
    {
        if (($model = ThuNhapKhac::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDelete(){
        if(isset($_POST['id'])){
            $this->findModel($_POST['id'])->delete();

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
        $model=new ThuNhapKhac();
        if(isset($_POST['name'])&&$_POST['name']!=''&&isset($_POST['total'])&&$_POST['total']!=''){
            $total=$model->convertTotal($_POST['total']);
            $model->name=$_POST['name'];
            $model->total=$total;
            $model->user_id=$this->getID();
            $model->save();


        }
        $data = new ThunhapkhacSearch();
        $data->user_id=$this->getID();
        $data1=$data->search($data);
        $data1->pagination->pageSize=10;
        return $this->render('nguon_thu_khac',['model'=>$model,'data1'=>$data1]);
    }




}
