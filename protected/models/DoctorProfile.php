<?php

/**
 * This is the model class for table "{{doctor_profile}}".
 *
 * The followings are the available columns in table '{{doctor_profile}}':
 * @property integer $docinfo_id
 * @property integer $user_id
 * @property string $doc_firstname
 * @property string $doc_lastname
 * @property string $doc_dob
 * @property string $doc_speciality
 * @property string $doc_certificate
 * @property string $doc_designated
 * @property string $doc_awards
 * @property string $doc_about
 * @property string $doc_address_1
 * @property string $doc_address_2
 * @property integer $doc_city
 * @property integer $doc_state
 * @property integer $doc_country
 * @property string $doc_phone
 * @property string $doc_mobile_no
 *
 * The followings are the available model relations:
 * @property Cities $docCity
 * @property Countries $docCountry
 * @property States $docState
 * @property Users $user
 */
class DoctorProfile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{doctor_profile}}';
    }

    public function getDoc_fullname() {
        return ucwords($this->doc_firstname . " " . $this->doc_lastname);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('doc_firstname, doc_dob, doc_city, doc_state, doc_country', 'required'),
            array('user_id, doc_city, doc_state, doc_country', 'numerical', 'integerOnly' => true),
            array('doc_firstname, doc_lastname, doc_phone, doc_mobile_no', 'length', 'max' => 100),
            array('doc_speciality, doc_designated', 'length', 'max' => 255),
            array('doc_certificate, doc_awards, doc_about, doc_address_1, doc_address_2', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('docinfo_id, user_id, doc_firstname, doc_lastname, doc_dob, doc_speciality, doc_certificate, doc_designated, doc_awards, doc_about, doc_address_1, doc_address_2, doc_city, doc_state, doc_country, doc_phone, doc_mobile_no', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'docCity' => array(self::BELONGS_TO, 'Cities', 'doc_city'),
            'docCountry' => array(self::BELONGS_TO, 'Countries', 'doc_country'),
            'docState' => array(self::BELONGS_TO, 'States', 'doc_state'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'docinfo_id' => 'Docinfo',
            'user_id' => 'User',
            'doc_firstname' => 'Doc Firstname',
            'doc_lastname' => 'Doc Lastname',
            'doc_fullname' => 'Fullname',
            'doc_dob' => 'Doc Dob',
            'doc_speciality' => 'Doc Speciality',
            'doc_certificate' => 'Doc Certificate',
            'doc_designated' => 'Doc Designated',
            'doc_awards' => 'Doc Awards',
            'doc_about' => 'Doc About',
            'doc_address_1' => 'Doc Address 1',
            'doc_address_2' => 'Doc Address 2',
            'doc_city' => 'Doc City',
            'doc_state' => 'Doc State',
            'doc_country' => 'Doc Country',
            'doc_phone' => 'Doc Phone',
            'doc_mobile_no' => 'Doc Mobile No',
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
//        if (!empty($this->doc_fullname) || $this->doc_fullname != ' ') {
//            var_dump($this->doc_fullname); exit;
//            $criteria->addCondition("doc_firstname LIKE '%{$this->doc_fullname}%'",'OR');
//            $criteria->addCondition("doc_lastname LIKE '%{$this->doc_fullname}%'");
//        }
        $criteria->compare('docinfo_id', $this->docinfo_id);
        $criteria->compare('user_id', $this->user_id);
//        $criteria->compare('doc_firstname', $this->doc_firstname, true);
//        $criteria->compare('doc_lastname', $this->doc_lastname, true);
        $criteria->compare('doc_dob', $this->doc_dob, true);
        $criteria->compare('doc_speciality', $this->doc_speciality, true);
        $criteria->compare('doc_certificate', $this->doc_certificate, true);
        $criteria->compare('doc_designated', $this->doc_designated, true);
        $criteria->compare('doc_awards', $this->doc_awards, true);
        $criteria->compare('doc_about', $this->doc_about, true);
        $criteria->compare('doc_address_1', $this->doc_address_1, true);
        $criteria->compare('doc_address_2', $this->doc_address_2, true);
        $criteria->compare('doc_city', $this->docCity->city);
        $criteria->compare('doc_state', $this->doc_state);
        $criteria->compare('doc_country', $this->doc_country);
        $criteria->compare('doc_phone', $this->doc_phone, true);
        $criteria->compare('doc_mobile_no', $this->doc_mobile_no, true);

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
     * @return DoctorProfile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
