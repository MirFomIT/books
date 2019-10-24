<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 2/3/2019
 * Time: 11:26 AM
 */

namespace app\models;


use Yii;
use yii\base\Exception;
use yii\base\Model;

class RegisterForm extends Model
{
    public $first_name;
    public $email;
    public $password;

    public function rules(){
        return[
            [['first_name','email','password'],'required'],
            [['first_name'],'string','min'=>3],
            [['email'],'email'],
            [['email'],'unique','targetClass'=>'app\models\User', 'targetAttribute' =>'email'],
        ];
    }

    public function register(){
        if($this->validate()){
            $user = new User();
            $user->attributes = $this->attributes;
            try {
                $user->password = Yii::$app->security->generatePasswordHash($this->password);
            } catch (Exception $e) {
                $e->getMessage();
            }
            $user->first_name = $this->first_name;

            return $user->save(false);

        }
    }
}

