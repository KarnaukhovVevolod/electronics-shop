<?php

namespace app\models;
use yii\base\Model;
use app\models\Usershop;
use app\models\User;

use Yii;

class RegistrationForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    
    public $login;
    public $password;
    public $confirm_password;
    
    public function attributeLabels() {
        return[
            'first_name'       => 'Имя',
            'last_name'        => 'Фамилия',
            'email'            => 'E-mail',
            
            'login'            => 'Логин',
            'password'         => 'Пароль',
            'confirm_password' => 'Повторить пароль',
            ];
    }
    
    public function rules() {
        return [
            [['first_name', 'last_name', 'email', 'login', 'password', 'confirm_password'], 'required'],
            [['first_name', 'last_name', 'login'], 'string', 'max' => 30],
            ['email','email'],
            [['email'], 'string', 'max' => 50],
            [['login'], 'string' , 'max' => 30,'min'=>5],
            [['password', 'confirm_password'], 'string', 'max' => 50, 'min' => 8],
            ['password', 'dataComparison','skipOnEmpty' => false, 'skipOnError' => false ],
            
        ];
    }
    
    public function dataComparison()
    {
        if( $this->password == $this->confirm_password)
        {
            
        }
        else {
            $this->addError('password','поля "Пароль"  и "Повторить пароль" не совпадают');
        }
          
    }
    
    public function ValidateDataBase($data)
    {
        //debug($data);
        //проверка на присутствие пользователя в базе данных
        $login = $data['login'];
        $email = $data['email'];
        $data_db = Usershop::find()->where(['login' => $login, 'email' => $email])->all();
        //debug($data_db);
        //die();
        if($data_db != null && is_array($data_db))
        {
            //print_r('$data_db');
            //debug($data_db);
            //die();
            $count_db = count($data_db);
            if($count_db == 2)
            {
                return 'Введите другой логин и E-mail, такой логин и E-mail уже существует';//, поэтому восстановите свой логин и пароль от личного кабинета или введите новые данные';
            }
            else{
                if($data_db[0]['login'] == $login )
                {
                    if($data_db[0]['email'] == $email)
                    {
                        return 'Введите другой логин и E-mail, такой логин и E-mail уже существует';//, поэтому, либо восстановите свой логин и пароль от личного кабинета, либо зарегистрируйте заново';
                    }
                    else{
                        return 'Введите другой  логин, такой логин уже существует';
                    }
                }
                else
                {
                    return 'Введите другой E-mail, такой E-mail уже существует';
                }
            }
            
        }
        else {
            $password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);
            
            $date =  date("Y-m-d H:i:s", time());
            
            //-----UserShop-save-------------
            //echo 'запись';
            $write_user_shop = new Usershop();
            $write_user_shop->first_name = $data['first_name'];
            $write_user_shop->last_name  = $data['last_name'];
            $write_user_shop->email = $data['email'];
            $write_user_shop->login = $data['login'];
            $write_user_shop->password = $data['password'];
            $write_user_shop->date = $date;
            $write_user_shop->block = false;
            $write_user_shop->save();
            //---------------------------------
            
            //$id = Yii::$app->db->getLastInsertID();
            //debug('first id');
            //debug($id);
            //-----UserAuth-save---------------
           
            $write_user_auth = new User();
            $write_user_auth->username = $data['login'];
            $write_user_auth->password = $password;
            $write_user_auth->date_user = $date;
            $write_user_auth->block = false;
            $write_user_auth->save();
            
            //---------------------------------
            $id = Yii::$app->db->getLastInsertID();
            //debug('second id');
            //debug($id);
            $userRole = Yii::$app->authManager->getRole('user');
            $userId = $id;
            Yii::$app->authManager->assign($userRole, $userId);
            
        //debug($date);
        //debug($password);
        //die();
            return 'Регистрация успешно пройдена, войдите на сайт под своим логином и паролем';
        }
    }
    
    
    
    
}
