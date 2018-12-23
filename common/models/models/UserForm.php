<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class UserForm extends Model
{
    public $username;
    public $password;
    public $status = 2;
    public $userstatus = 1;
    public $userimg = ''; 
    public $email = '';
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
           // ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
           // ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


    public function adduser()
   {
	$user = new User();
	$user->username = $this->username;
	$user->setPassword($this->password);
	$user->generateAuthKey();
	$user->status= $this->status;
	$user->userstatus= $this->userstatus;
	$user->email = !empty($this->email)? $this->email:$this->username.'@mlab.com';
	$user->save(false);   
   }
     
}
