<?php

namespace app\modules\taichinh\models;

use app\modules\dangki\models\ThunhapkhacSearch;
use Yii;
use yii\db\Command;
use yii\data\ActiveDataProvider;

use yii\db\Query;

/**
 * This is the model class for table "thu_nhap_khac".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property double $total
 * @property string $date_created
 */
class ThuNhapKhac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thu_nhap_khac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required','message'=>'{attribute} không được để trống !'],
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Tên khoản thu',
            'total' => 'Tổng số tiền(VND)',
            'date_created' => 'Ngày tạo',
        ];
    }
    /*public function getThunhapkhac($id){
        $query=new Query();
        $thunhapkhac=
            $query->select(['name','total','date_created'])
            ->from('thu_nhap_khac')
            ->where(['user_id'=>$id])
            ->all();
        return $thunhapkhac;

    }*/

    public function getThunhapkhac1($id){
    $thunhapkhac=ThuNhapKhac::find()->select(['id','name','total','date_created'])->where(['user_id'=>$id]);

    $dataProvider = new ActiveDataProvider([
        'query' => $thunhapkhac,
    ]);
    return $dataProvider;

    }

    public function convertTotal($total){
        $data=explode(",",$total);
        $total_new='';
        foreach ($data as $row){
            $total_new.=$row;
        }
        return $total_new;

    }

}
