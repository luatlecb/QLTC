<?php

namespace app\modules\taichinh\models;

use Yii;

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
            [['user_id', 'name', 'total'], 'required'],
            [['user_id'], 'integer'],
            [['total'], 'number'],
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
            'name' => 'Name',
            'total' => 'Total',
            'date_created' => 'Date Created',
        ];
    }
}
