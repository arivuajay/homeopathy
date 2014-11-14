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

        $user = User::model()->find('useremail = :U', array(':U' => $this->username));

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
            $lastLogin = date('Y-m-d H:i:s');
            $user->user_last_login = $lastLogin;
            $user->user_ip_addr = Yii::app()->request->userHostAddress;
            $user->save(false);
            $this->_id = $user->user_id;
            $this->setState('user_type', $user->user_type);
            $this->setState('expired_user', (date('Y-m-d') >= date('Y-m-d', strtotime($user->expiry_date))) ? true : false);
            $docModel = DoctorProfile::model()->find("user_id={$this->_id}");
           
            $patientModel = PatientProfile::model()->find("user_id={$this->_id}");
            $diagnosticModel = DiagnosticProfile::model()->find("user_id={$this->_id}");
            $this->setState('doctor_name', $docModel->doctor_name);
            $this->setState('patient_name', $patientModel->first_name.$patientModel->last_name);
            $this->setState('diagnostic_name', $diagnosticModel->full_name);
            
            $this->setState('tenant', "abraham.com");
            
        endif;
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}