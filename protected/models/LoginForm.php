<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel {

    public $username;
    public $password;
    public $rememberMe = 0;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('username, password', 'required'),
            //array('admin_username', 'email'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => Myclass::t('APP2'),
            'password' => Myclass::t('APP3'),
            'rememberMe' => Myclass::t('APP4'),
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {

        if (!$this->hasErrors()):
            $this->_identity = new UserIdentity($this->username, $this->password);
            if (!$this->_identity->authenticate()):
                switch ($this->_identity->errorCode):
                    case 1:
                        $this->addError('username', Myclass::t('Incorrect Username or Password'));
                        break;
                    case 3:
                        $this->addError('password', Yii::t('user', 'Your account has been blocked'));
                        break;
                    case 4:
                        $this->addError('password', Yii::t('user', 'ACCOUNT_DELETED'));
                        break;
                endswitch;
            endif;
        endif;
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null):
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        endif;
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE):
            //$duration= 3600*24*30; // 30 days
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days

            Yii::app()->user->login($this->_identity, $duration);
            MyClass::rememberMeComputer($this->username, $this->rememberMe);
            return true;
        else:
            return false;
        endif;
    }

}




