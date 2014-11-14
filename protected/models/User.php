<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $user_id
 * @property string $useremail
 * @property string $password
 * @property integer $user_type
 * @property integer $company_id
 * @property string $activation_key
 * @property string $mobile_number
 * @property string $user_last_login
 * @property string $user_ip_addr
 * @property integer $created_client
 *  @property string $created_on
 * @property integer $user_status
 * @property string $activation_key
 * @property integer $subscription_id
 *
 * The followings are the available model relations:
 * @property Calendar[] $calendars
 * @property Calendar[] $calendars1
 * @property ClientProfile[] $clientProfiles
 * @property User $createdClient
 * @property Company $company
 * @property User[] $users
 * @property UserType $userType
 * @property User[] $usersStaffProfile[] $staffProfiles
 * @property integer $company_id
 * @property Subscriptions $subscription
 * @property WebFormAllergy[] $webFormAllergies
 * @property WebFormBloodGm[] $webFormBloodGms
 * @property WebFormBloodPm[] $webFormBloodPms
 * @property WebFormCholesterol[] $webFormCholesterols
 * @property WebFormConditions[] $webFormConditions
 * @property WebFormContacts[] $webFormContacts
 * @property WebFormDocuments[] $webFormDocuments
 * @property WebFormExercise[] $webFormExercises
 * @property WebFormFamilyHistory[] $webFormFamilyHistories
 * @property WebFormFoodanddrink[] $webFormFoodanddrinks
 * @property WebFormHeight[] $webFormHeights
 * @property WebFormImmunization[] $webFormImmunizations
 * @property WebFormInsurance[] $webFormInsurances
 * @property WebFormLabTest[] $webFormLabTests
 * @property WebFormMedDevice[] $webFormMedDevices
 * @property WebFormMedication[] $webFormMedications
 * @property WebFormPfm[] $webFormPfms
 * @property WebFormProcedure[] $webFormProcedures
 * @property WebFormWeight[] $webFormWeights
 */
class User extends CActiveRecord {

    public $emailReq = array('useremail', 'email');
    public $currentpassword;
    public $repeatpassword;
    public $confirmpass;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'patient' => array('condition' => $alias . '.user_type = "4"'),
            'doctor' => array('condition' => $alias . '.user_type = "3" '),
            'doctoranddiagnostic' => array('condition' => $alias . '.user_type IN  ("2","3") '),
            'diagnostic' => array('condition' => $alias . '.user_type = "2" '),
            'isActive' => array('condition' => $alias . '.user_status  = "1"'),
            'orderByIdDesc' => array('order' => $alias . '.user_id  DESC'),
            'trialPeriod' => array('condition' => $alias . '.subscription_id = "0"'),
            'subscriptionPeriod' => array('condition' => $alias . '.subscription_id <> "0"')
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('activation_key', 'required', 'on' => 'activate'),
            array('mobile_number', 'required', 'on' => 'changemobile'),
            array('useremail,password,confirmpass,mobile_number', 'required', 'on' => 'social_register'),
            array('useremail,password,confirmpass,mobile_number', 'required', 'on' => 'create'),
            array('useremail,mobile_number', 'unique', 'on' => 'create,bookapp'),
            array('useremail,mobile_number', 'required', 'on' => 'bookapp'),
            array('useremail,mobile_number', 'required', 'on' => 'admin_register,doctor_register'),
            array('password,currentpassword,repeatpassword', 'required', 'on' => 'changepassword'),
            array('currentpassword', 'equalPasswords', 'on' => 'changepassword'),
            array('password', 'compare', 'compareAttribute' => 'repeatpassword', 'message' => 'RepeatPassword does not match', 'on' => 'changepassword'),
            array('password', 'compare', 'compareAttribute' => 'confirmpass', 'message' => 'RepeatPassword does not match', 'on' => 'create'),
            array('useremail', 'email', 'on' => 'admin_register,doctor_register,bookapp'),
            array('useremail', 'unique', 'on' => 'admin_register,doctor_register,bookapp'),
//            array('password', 'compare', 'compareAttribute' => 'confirmpass', 'allowEmpty' => TRUE, 'on' => 'create-staff', 'message' => 'RepeatPassword does not match'),
//            array('newpassword', 'compare', 'compareAttribute' => 'repeatpassword', 'allowEmpty' => TRUE, 'on' => 'update-staff', 'message' => 'RepeatPassword does not match'),
            array('mobile_number', 'required', 'on' => 'forgotpassword'),
            array('mobile_number', 'checkMobilenumber', 'on' => 'forgotpassword'),
            array('activation_key', 'checkActivationkey', 'on' => 'activate'),
//            array('useremail', 'unique', 'allowEmpty' => true, 'on' => 'create-staff,update-staff'),
//            array('user_type, created_client,user_status,company_id', 'numerical', 'integerOnly' => true),
//            array('useremail, password, user_last_login, user_ip_addr', 'length', 'max' => 255),
            array('created_on,contactname,expiry_date,subscription_id,contactemail,contactphone,subject,message,repeatpassword,mobile_number', 'safe'),
            array('user_id, useremail, password, user_type, user_last_login, user_ip_addr,created_client, user_status, activation_key', 'safe', 'on' => 'search'),
        );
    }

    public function checkMobilenumber($attribute) {
        $user = User::model()->find('mobile_number="' . $this->mobile_number . '"');

        if (empty($user)):
            $this->addError($attribute, Yii::t('user', 'Mobile number does not exists'));
        endif;
    }

    public function checkActivationkey($attribute) {
        $aft_enc = Myclass::encrypt($this->activation_key);
        $user = User::model()->find('activation_key="' . $aft_enc . '"');

        if (empty($user)):
            $this->addError($attribute, Yii::t('user', 'Invalid activation key'));
        endif;
    }

    public function equalPasswords($attribute, $params) {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if ($this->$attribute != "" && $user->password != Myclass::encrypt($this->$attribute)) {
            $this->addError($attribute, 'Current password is incorrect.');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'calendarAssigned' => array(self::HAS_MANY, 'Calendar', 'cal_assigned_to'),
            'calendarCreated' => array(self::HAS_MANY, 'Calendar', 'cal_created_by'),
            'patientProfiles' => array(self::HAS_ONE, 'PatientProfile', 'user_id'),
            'docotrProfiles' => array(self::HAS_ONE, 'DoctorProfile', 'user_id'),
            'diagnosticsProfiles' => array(self::HAS_ONE, 'DiagnosticProfile', 'user_id'),
            'userType' => array(self::BELONGS_TO, 'UserType', 'user_type'),
            'clientreports' => array(self::HAS_MANY, 'Clientreport', 'cli_id'),
            'subscription' => array(self::BELONGS_TO, 'Subscriptions', 'subscription_id', 'scopes' => array('subscriptionPeriod')),
            'reports' => array(self::HAS_MANY, 'Reports', 'user_id'),
            'webFormAllergies' => array(self::HAS_MANY, 'WebFormAllergy', 'patient_id'),
            'webFormBloodGms' => array(self::HAS_MANY, 'WebFormBloodGm', 'patient_id'),
            'webFormBloodPms' => array(self::HAS_MANY, 'WebFormBloodPm', 'patient_id'),
            'webFormCholesterols' => array(self::HAS_MANY, 'WebFormCholesterol', 'patient_id'),
            'webFormConditions' => array(self::HAS_MANY, 'WebFormConditions', 'patient_id'),
            'webFormContacts' => array(self::HAS_MANY, 'WebFormContacts', 'created_by'),
            'webFormDocuments' => array(self::HAS_MANY, 'WebFormDocuments', 'patient_id'),
            'webFormExercises' => array(self::HAS_MANY, 'WebFormExercise', 'patient_id'),
            'webFormFamilyHistories' => array(self::HAS_MANY, 'WebFormFamilyHistory', 'patient_id'),
            'webFormFoodanddrinks' => array(self::HAS_MANY, 'WebFormFoodanddrink', 'patient_id'),
            'webFormHeights' => array(self::HAS_MANY, 'WebFormHeight', 'patient_id'),
            'webFormImmunizations' => array(self::HAS_MANY, 'WebFormImmunization', 'patient_id'),
            'webFormInsurances' => array(self::HAS_MANY, 'WebFormInsurance', 'patient_id'),
            'webFormLabTests' => array(self::HAS_MANY, 'WebFormLabTest', 'patient_id'),
            'webFormMedDevices' => array(self::HAS_MANY, 'WebFormMedDevice', 'patient_id'),
            'webFormMedications' => array(self::HAS_MANY, 'WebFormMedication', 'patient_id'),
            'webFormPfms' => array(self::HAS_MANY, 'WebFormPfm', 'patient_id'),
            'webFormProcedures' => array(self::HAS_MANY, 'WebFormProcedure', 'patient_id'),
            'webFormWeights' => array(self::HAS_MANY, 'WebFormWeight', 'patient_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'useremail' => 'E-mail',
            'password' => 'Password',
            'user_type' => 'User Type',
            'user_last_login' => 'User Last Login',
            'user_ip_addr' => 'User Ip Addr',
            'created_client' => 'Created Client',
            'created_on' => 'Created Date',
            'user_status' => 'User Status',
            'company_id' => 'Reference Table of tbl_company',
            'confirmpass' => 'Retype Password',
            'mobile_number' => 'Mobile Number',
            'newpassword' => 'New Password',
            'repeatpassword' => 'Repeat Password',
            'subscription_id' => 'Subscription Plan',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('useremail', $this->useremail, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('user_last_login', $this->user_last_login, true);
        $criteria->compare('user_ip_addr', $this->user_ip_addr, true);
        $criteria->compare('created_client', $this->created_client);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('user_status', $this->user_status);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('activation_key', $this->activation_key, true);
        $criteria->compare('mobile_number', $this->mobile_number);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if ($this->isNewRecord):
            $this->created_on = new CDbExpression('NOW()');
            $this->company_id = COMPANY_ID;
            $this->created_client = Yii::app()->user->id;
            if ($this->subscription_id == 0) {
                if ($this->user_type == 2) {
                    $days = TRIAL_PERIOD_DIAGNOS;
                } elseif ($this->user_type == 3) {
                    $days = TRIAL_PERIOD_DOCTOR;
                } else {
                    $days = TRIAL_PERIOD_PATIENT;
                }
            } else {
                $subscrbe = Subscriptions::model()->findByPk($this->subscription_id);
                $days = $subscrbe->subscription_days;
            }
            $this->expiry_date = date('Y-m-d', strtotime("+$days days"));
        endif;

        return parent::beforeSave();
    }

}
