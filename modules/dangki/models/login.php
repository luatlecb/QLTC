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
class login extends \yii\db\ActiveRecord
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
            [['email', 'username', 'password'], 'required','message'=>'{attribute} không thể bỏ trống !'],
            ['password', 'validateLogin']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username/email',
            'password' => 'Password',
        ];
    }
    public function validateLogin($username,$password){
        if (!$this->hasErrors()) {
            $user =$this->getNumberUser($username);
            foreach ($user as $row ) {
                if (Yii::$app->getSecurity()->validatePassword($password, $row->password)) {
                    $user=(object)['id'=>$row->id,'name'=>$row->name];
                    return $user;
                } else {
                    $this->addError('username');
                    $this->addError('password');
                    return false;
                }
            }

        }
    }

    /*public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Tài khoản hoặc mật khẩu không đúng !');
            }
        }
    }*/
    public function getNumberUser($username)
    {

        $numer_user=Users::find()->where(['username'=>$username])->orWhere(['email'=>$username])->all();
        return $numer_user;

    }
    public function getUser($username,$password)
    {
        $password1=password_hash($password, PASSWORD_DEFAULT);
        $numer_user=Users::find()->where(['username'=>$username])->orWhere(['email'=>$username])->andWhere(['password'=>$password1])->limit(1)->all();
        return $numer_user;

    }

}
