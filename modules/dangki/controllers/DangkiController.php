<?php

namespace app\modules\dangki\controllers;

use app\models\LoginForm;
use app\modules\dangki\models\login;
use Yii;
use app\modules\dangki\models\Users;
use app\modules\dangki\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * DangkiController implements the CRUD actions for Users model.
 */
class DangkiController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $password_old=$model->password;
        if ($model->load(Yii::$app->request->post())) {
            if($model->password==''){
                $model->password=$password_old;
            }else{
                $model->password = password_hash($model->password, PASSWORD_DEFAULT);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionTest(){

        return $this->render('test');
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDangki()
    {
        $model = new Users();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        else if($model->load(Yii::$app->request->post())){
            $model->password = password_hash($model->password, PASSWORD_DEFAULT);
            $model->save();
        };
        return $this->render('dang_ki',['model'=>$model]);
    }
    public function actionDangnhap()
    {
        if(Yii::$app->request->post()){
            $user=Yii::$app->request->post();
            $model=new login();
            $login=$model->validateLogin($user['login']['username'],$user['login']['password']);
            if($login==false){
                Yii::$app->session->setFlash('error', "Tài khoản hoặc mật khẩu không đúng !");
                return $this->render('dang_nhap',['model'=>$model]);
            }else{
                $_SESSION['user']=$login;
                return $this->redirect(Yii::$app->request->baseUrl.'/taichinh/taichinh/index');
            }

        } else{
            $model=new login();
            return $this->render('dang_nhap',['model'=>$model]);
        }

    }

    public function actionDangxuat(){
        unset($_SESSION['user']);
        return $this->redirect(['index']);
    }




}
