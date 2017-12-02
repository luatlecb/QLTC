<?php

namespace app\modules\dangki\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $birthday
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['name', 'birthday', 'address', 'email', 'username', 'password'], 'required','message'=>'{attribute} không thể bỏ trống !'],
            ['email','email','message'=>'Email không đúng!'],
            [['email'],'unique','message'=>' Email đã tồn tại!'],
            [['username'],'unique','message'=>' Username đã tồn tại!'],
            ['gender','required','message'=>'Chưa chọn giới tính !'],
            [['name', 'birthday', 'phone'], 'string', 'max' => 40], [['gender'], 'string', 'max' => 8], [['address', 'email', 'username', 'password'], 'string', 'max' => 255],
            ['phone','match','pattern'=>'/^[0-9]+$/u','message'=>'{attribute} không đúng!']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Họ tên',
            'gender' => 'Giới tính',
            'birthday' => 'Ngày sinh ',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'username' => 'Username',
            'password' => 'Password',
            're-password'=>'Re-password'
        ];
    }

}
