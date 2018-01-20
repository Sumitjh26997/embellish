<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $company;
    public $confirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['phone','required'],
            ['phone','integer'],
            ['phone','string','min'=>10,'max'=>10],

            ['address', 'required'],
            ['address', 'string', 'max' => 255],

            ['company', 'required'],
            ['company', 'string', 'max' => 255],

            ['confirm', 'required'],
            ['confirm', 'string', 'min' => 6],
            ['confirm','passvalidate'],
        ];
    }

    public function passvalidate()
    {
        if($this->password != $this->confirm)
        {
            $this->addError('password','Passwords do not match');
            $this->addError('confirm','Passwords do not match');
        }
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->company = $this->company;
        $user->status = 0;
        return $user->save() ? $user : null;
    }
}
