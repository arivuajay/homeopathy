<?php

/**
 * This is the model class for table "{{patient_profile}}".
 *
 * The followings are the available columns in table '{{patient_profile}}':
 * @property integer $pt_id
 * @property integer $user_id
 * @property string $pt_firstname
 * @property string $pt_lastname
 * @property string $pt_sex
 * @property string $pt_email
 * @property string $pt_dob
 * @property string $pt_bloodgroup
 * @property integer $pt_height
 * @property integer $pt_weight
 * @property string $pt_address
 * @property integer $pt_city
 * @property integer $pt_state
 * @property integer $pt_country
 * @property string $pt_telephone
 * @property string $pt_mobile
 *
 * The followings are the available model relations:
 * @property Cities $ptCity
 * @property Countries $ptCountry
 * @property States $ptState
 * @property Users $user
 */
class PatientProfile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{patient_profile}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
//            'isActive' => array('condition' => $alias . '.ven_status  = "1"'),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pt_firstname, pt_sex, pt_dob, pt_city, pt_state, pt_country, pt_mobile', 'required'),
            array('pt_height, pt_weight, pt_city, pt_state, pt_country', 'numerical', 'integerOnly' => true),
            array('pt_firstname, pt_lastname, pt_telephone, pt_mobile', 'length', 'max' => 100),
            array('pt_sex, pt_bloodgroup', 'length', 'max' => 1),
            array('pt_email', 'length', 'max' => 255),
            array('pt_address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('pt_id, user_id, pt_firstname, pt_lastname, pt_sex, pt_email, pt_dob, pt_bloodgroup, pt_height, pt_weight, pt_address, pt_city, pt_state, pt_country, pt_telephone, pt_mobile', 'safe', 'on' => 'search'),            
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ptCity' => array(self::BELONGS_TO, 'Cities', 'pt_city'),
            'ptCountry' => array(self::BELONGS_TO, 'Countries', 'pt_country'),
            'ptState' => array(self::BELONGS_TO, 'States', 'pt_state'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'pt_firstname' => Myclass::t('APP106'),
            'pt_lastname' => Myclass::t('APP107'),
            'pt_sex' => Myclass::t('APP401'),
            'pt_email' => Myclass::t('APP98'),
            'pt_dob' => Myclass::t('APP108'),
            'pt_bloodgroup' => Myclass::t('APP402'),
            'pt_height' => Myclass::t('APP403'),
            'pt_weight' => Myclass::t('APP404'),
            'pt_address' => Myclass::t('APP405'),
            'pt_city' => Myclass::t('APP116'),
            'pt_state' => Myclass::t('APP117'),
            'pt_country' => Myclass::t('APP118'),
            'pt_telephone' => Myclass::t('APP119'),
            'pt_mobile' => Myclass::t('APP120'),
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

        $criteria->compare('pt_id', $this->pt_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('pt_firstname', $this->pt_firstname, true);
        $criteria->compare('pt_lastname', $this->pt_lastname, true);
        $criteria->compare('pt_sex', $this->pt_sex, true);
        $criteria->compare('pt_email', $this->pt_email, true);
        $criteria->compare('pt_dob', $this->pt_dob, true);
        $criteria->compare('pt_bloodgroup', $this->pt_bloodgroup, true);
        $criteria->compare('pt_height', $this->pt_height);
        $criteria->compare('pt_weight', $this->pt_weight);
        $criteria->compare('pt_address', $this->pt_address, true);
        $criteria->compare('pt_city', $this->pt_city);
        $criteria->compare('pt_state', $this->pt_state);
        $criteria->compare('pt_country', $this->pt_country);
        $criteria->compare('pt_telephone', $this->pt_telephone, true);
        $criteria->compare('pt_mobile', $this->pt_mobile, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['DEFAULT_PAGE_SIZE']),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PatientProfile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
