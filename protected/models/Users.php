<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $tenant
 * @property integer $ur_id
 * @property integer $ur_role_id
 * @property string $ur_username
 * @property string $ur_password
 * @property string $ur_activation_key
 * @property string $ur_created_at
 * @property string $ur_modified_at
 * @property string $ur_last_login
 * @property string $ur_last_ip
 * @property string $ur_status
 *
 * The followings are the available model relations:
 * @property PurchaseOrder[] $purchaseOrders
 * @property UserRole $urRole
 * @property Tenants $tenant0
 */
class Users extends CActiveRecord
{
    //Define public variable
    public $old_password;
    public $new_password;
    public $repeat_password;
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return '{{users}}';
    }
        
    public function scopes() {
       $alias = $this->getTableAlias(false, false);
       return array(
           'isPatient' => array('condition' => $alias . '.ur_role_id  = "8"'),
           'isDoctor' => array('condition' => $alias . '.ur_role_id  = "9"'),
           'isPharmacist' => array('condition' => $alias . '.ur_role_id  = "10"'),
           'isActive' => array('condition' => $alias . '.ur_status  = "1"'),
       );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    //array('tenant, ur_role_id, ur_username, ur_password, ur_created_at', 'required'),
                array('ur_username, ur_password', 'required'),
                array('tenant, ur_role_id', 'numerical', 'integerOnly'=>true),
                array('ur_username, ur_activation_key', 'length', 'max'=>100),
                array('ur_password', 'length', 'max'=>255),
                array('ur_last_ip', 'length', 'max'=>50),
                array('ur_status', 'length', 'max'=>1),
                array('ur_username', 'unique', 'message'=>'Username already exists!'),
                //array('tenant,ur_modified_at, ur_last_login', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('tenant, ur_id, ur_role_id, ur_username, ur_password, ur_activation_key, ur_created_at, ur_modified_at, ur_last_login, ur_last_ip, ur_status', 'safe', 'on'=>'search'),  
                
                //Define the rules for old_password, new_password and repeat_password with changePwd Scenario.
                array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
                array('old_password', 'findPasswords', 'on' => 'changePwd'),
                array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
            );
    }
    
    //matching the old password with your existing password.
    public function findPasswords($attribute, $params)
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        if ($user->ur_password != Myclass::encrypt($this->old_password))
            $this->addError($attribute, 'Old password is incorrect.');
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'purchaseOrders' => array(self::HAS_MANY, 'PurchaseOrder', 'po_created_by'),
                'urRole' => array(self::BELONGS_TO, 'UserRole', 'ur_role_id'),
                'tenant' => array(self::BELONGS_TO, 'Tenants', 'tenant'),
                'doctor' => array(self::HAS_ONE, 'DoctorProfile', 'user_id'),
                'patient' => array(self::HAS_ONE, 'PatientProfile', 'user_id'),
                'pharmacist' => array(self::HAS_ONE, 'PharmacistProfile', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
                'tenant' => Myclass::t("APP78"),
                'ur_id' => Myclass::t("APP251"),
                'ur_role_id' => Myclass::t("APP252"),
                'ur_username' => Myclass::t("APP2"),
                'ur_password' => Myclass::t("APP3"),

                'ur_activation_key' => Myclass::t("APP253"),
                'ur_created_at' => Myclass::t("APP99"),
                'ur_modified_at' => Myclass::t("APP254"),
                'ur_last_login' => Myclass::t("APP255"),
                'ur_last_ip' => Myclass::t("APP256"),
                'ur_status' => Myclass::t("APP55"),
            
                'old_password' => Myclass::t("APP257"),
                'new_password' => Myclass::t("APP258"),
                'repeat_password' => Myclass::t("APP259"),
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
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('tenant',$this->tenant);
        $criteria->compare('ur_id',$this->ur_id);
        $criteria->compare('ur_role_id',$this->ur_role_id);
        $criteria->compare('ur_username',$this->ur_username,true);
        $criteria->compare('ur_password',$this->ur_password,true);

        $criteria->compare('ur_activation_key',$this->ur_activation_key,true);
        $criteria->compare('ur_created_at',$this->ur_created_at,true);
        $criteria->compare('ur_modified_at',$this->ur_modified_at,true);
        $criteria->compare('ur_last_login',$this->ur_last_login,true);
        $criteria->compare('ur_last_ip',$this->ur_last_ip,true);
        $criteria->compare('ur_status',$this->ur_status,true);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave(){

        if($this->isNewRecord){
                $this->tenant = Yii::app()->user->tenant;	
                $this->ur_created_at = new CDbExpression('NOW()');
        }

        if($_POST['Users']['ur_password'])
        {
            $this->ur_password = Myclass::encrypt($_POST['Users']['ur_password']);
        }

        $this->ur_modified_at = new CDbExpression('NOW()');

        return parent::beforeSave();
    }
        
}
