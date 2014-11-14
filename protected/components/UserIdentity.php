<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    const ERROR_ACCOUNT_BLOCKED = 3;
    const ERROR_ACCOUNT_DELETED = 4;

    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $tenant = 1;
        $user = Users::model()->find('ur_username = :U', array(':U' => $this->username));

        if ($user === null):
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($user->user_status == 0):
            $this->errorCode = self::ERROR_ACCOUNT_BLOCKED;
        else:
            $is_correct_password = ($user->password !== Myclass::encrypt($this->password)) ? false : true;

            if ($is_correct_password):
                $this->errorCode = self::ERROR_NONE;
            else:
                $this->errorCode = self::ERROR_USERNAME_INVALID;   // Error Code : 1
            endif;
        endif;

        if ($this->errorCode == self::ERROR_NONE):
            $user->ur_last_login = date('Y-m-d H:i:s');
            $user->ur_last_ip = Yii::app()->request->userHostAddress;
            $user->save(false);
            $this->_id = $user->ur_id;
            $this->setState('ur_role_id', $user->ur_role_id);
            $this->setState('tenant', $tenant);
        endif;
        
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}