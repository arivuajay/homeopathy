<?php

/**
 * This is the model class for table "{{usermeta}}".
 *
 * The followings are the available columns in table '{{usermeta}}':
 * @property string $umeta_id
 * @property string $user_id
 * @property string $meta_key
 * @property string $meta_value
 */
class Usermeta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{usermeta}}';
	}
	public $ur_role_name;
    public $ur_role_dob;
    public $ur_role_specialty;
	public $ur_role_certif;
	public $ur_role_desig;
	public $ur_role_awards;
	public $ur_role_about;
	public $ur_role_address_one;
	public $ur_role_address_two;
	public $ur_role_city;
	public $ur_role_state;
	public $ur_role_country;
	public $ur_role_phone;
	public $ur_role_mobile;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'length', 'max'=>20),
			array('meta_key', 'length', 'max'=>255),
			array('ur_role_name', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('umeta_id, user_id, meta_key, meta_value', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'umeta_id' => 'Umeta',
			'user_id' => 'User',
			'meta_key' => 'Meta Key',
			'meta_value' => 'Meta Value',
			
			'ur_role_name' => 'Doctor Name',
			'ur_role_dob' => 'Date of birth',
			'ur_role_specialty' => 'Specialty',
			'ur_role_certif' => 'Certifications',
			'ur_role_desig' => 'Designation',
			'ur_role_awards' => 'Awards',
			'ur_role_about' => 'About',
			'ur_role_address_one' => 'Address 1',
			'ur_role_address_two' => 'Address 2',
			'ur_role_city' => 'City',
			'ur_role_state' => 'State',
			'ur_role_country' => 'Country',
			'ur_role_phone' => 'Telephone',
			'ur_role_mobile' => 'Mobile',
			
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

		$criteria->compare('umeta_id',$this->umeta_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('meta_key',$this->meta_key,true);
		$criteria->compare('meta_value',$this->meta_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usermeta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
