<?php

namespace app\modules\taichinh\models;

use Yii;

/**
 * This is the model class for table "thu_nhap".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $nguon_thu
 * @property double $so_du
 * @property string $date_created
 */
class taiChinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thu_nhap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_id', 'nguon_thu'], 'required','message'=>'{attribute} không được bỏ trống !'],
            [['id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
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
            'nguon_thu' => 'Nguồn thu cố định',
            'so_du' => 'Số dư',
            'date_created' => 'Date Created',
        ];
    }
    public function getNguonThu($id){
        $taichinh=taiChinh::find()->where(['user_id'=>$id])->all();
        return $taichinh;
    }
}
