<?php

/**
 * This is the model class for table "{{pharmacist_profile}}".
 *
 * The followings are the available columns in table '{{pharmacist_profile}}':
 * @property integer $phr_id
 * @property integer $user_id
 * @property string $phr_first_name
 * @property string $phr_last_name
 * @property string $phr_dob
 * @property string $phr_designation
 * @property string $phr_about
 * @property string $phr_address_1
 * @property string $phr_address_2
 * @property integer $phr_city
 * @property integer $phr_state
 * @property integer $phr_country
 * @property string $phr_phone
 * @property string $phr_mobile
 *
 * The followings are the available model relations:
 * @property Countries $phrCountry
 * @property Cities $phrCity
 * @property States $phrState
 * @property Users $user
 */
class PharmacistProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
            return '{{pharmacist_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('phr_first_name, phr_dob, phr_address_1, phr_city, phr_state, phr_country, phr_mobile', 'required'),
                array('phr_city, phr_state, phr_country', 'numerical', 'integerOnly'=>true),
                array('phr_first_name, phr_last_name, phr_phone, phr_mobile', 'length', 'max'=>100),
                array('phr_designation', 'length', 'max'=>255),
                array('phr_about, phr_address_2', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('phr_id, user_id, phr_first_name, phr_last_name, phr_dob, phr_designation, phr_about, phr_address_1, phr_address_2, phr_city, phr_state, phr_country, phr_phone, phr_mobile', 'safe', 'on'=>'search'),
            );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                'phrCountry' => array(self::BELONGS_TO, 'Countries', 'phr_country'),
                'phrCity' => array(self::BELONGS_TO, 'Cities', 'phr_city'),
                'phrState' => array(self::BELONGS_TO, 'States', 'phr_state'),
                'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            return array(
                'phr_first_name' => Myclass::t('APP106'),
                'phr_last_name' => Myclass::t('APP107'),
                'phr_dob' => Myclass::t('APP108'),
                'phr_designation' => Myclass::t('APP111'),
                'phr_about' => Myclass::t('APP113'),
                'phr_address_1' => Myclass::t('APP114'),
                'phr_address_2' => Myclass::t('APP115'),
                'phr_city' => Myclass::t('APP116'),
                'phr_state' => Myclass::t('APP117'),
                'phr_country' => Myclass::t('APP118'),
                'phr_phone' => Myclass::t('APP119'),
                'phr_mobile' => Myclass::t('APP120'),
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

            $criteria->compare('phr_id',$this->phr_id);
            $criteria->compare('user_id',$this->user_id);
            $criteria->compare('phr_first_name',$this->phr_first_name,true);
            $criteria->compare('phr_last_name',$this->phr_last_name,true);
            $criteria->compare('phr_dob',$this->phr_dob,true);
            $criteria->compare('phr_designation',$this->phr_designation,true);
            $criteria->compare('phr_about',$this->phr_about,true);
            $criteria->compare('phr_address_1',$this->phr_address_1,true);
            $criteria->compare('phr_address_2',$this->phr_address_2,true);
            $criteria->compare('phr_city',$this->phr_city);
            $criteria->compare('phr_state',$this->phr_state);
            $criteria->compare('phr_country',$this->phr_country);
            $criteria->compare('phr_phone',$this->phr_phone,true);
            $criteria->compare('phr_mobile',$this->phr_mobile,true);

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
	 * @return PharmacistProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
