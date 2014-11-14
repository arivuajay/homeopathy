<?php

/**
 * This is the model class for table "{{tenants}}".
 *
 * The followings are the available columns in table '{{tenants}}':
 * @property integer $tn_id
 * @property string $tn_hospital_name
 * @property string $tn_address_one
 * @property string $tn_address_two
 * @property string $tn_address_three
 * @property integer $tn_city
 * @property integer $tn_state
 * @property integer $tn_country
 * @property string $tn_website
 * @property string $tn_email
 * @property string $tn_created_at
 * @property integer $tn_created_by
 * @property string $tn_status
 *
 * The followings are the available model relations:
 * @property MedStock[] $medStocks
 * @property Medicines[] $medicines
 * @property PurchaseOrder[] $purchaseOrders
 * @property SalesOrder[] $salesOrders
 * @property Users[] $users
 */
class Tenants extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenants}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tn_hospital_name, tn_address_one, tn_address_two, tn_created_at', 'required'),
			array('tn_city, tn_state, tn_country, tn_created_by', 'numerical', 'integerOnly'=>true),
			array('tn_hospital_name', 'length', 'max'=>150),
			array('tn_address_one, tn_address_two, tn_address_three', 'length', 'max'=>255),
			array('tn_website, tn_email', 'length', 'max'=>100),
			array('tn_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tn_id, tn_hospital_name, tn_address_one, tn_address_two, tn_address_three, tn_city, tn_state, tn_country, tn_website, tn_email, tn_created_at, tn_created_by, tn_status', 'safe', 'on'=>'search'),
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
			'medStocks' => array(self::HAS_MANY, 'MedStock', 'tenant'),
			'medicines' => array(self::HAS_MANY, 'Medicines', 'tenant'),
			'purchaseOrders' => array(self::HAS_MANY, 'PurchaseOrder', 'tenant'),
			'salesOrders' => array(self::HAS_MANY, 'SalesOrder', 'tenant'),
			'users' => array(self::HAS_MANY, 'Users', 'tenant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tn_id' => 'Tn',
			'tn_hospital_name' => 'Tn Hospital Name',
			'tn_address_one' => 'Tn Address One',
			'tn_address_two' => 'Tn Address Two',
			'tn_address_three' => 'Tn Address Three',
			'tn_city' => 'Tn City',
			'tn_state' => 'Tn State',
			'tn_country' => 'Tn Country',
			'tn_website' => 'Tn Website',
			'tn_email' => 'Tn Email',
			'tn_created_at' => 'Tn Created At',
			'tn_created_by' => 'Tn Created By',
			'tn_status' => 'Tn Status',
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

		$criteria->compare('tn_id',$this->tn_id);
		$criteria->compare('tn_hospital_name',$this->tn_hospital_name,true);
		$criteria->compare('tn_address_one',$this->tn_address_one,true);
		$criteria->compare('tn_address_two',$this->tn_address_two,true);
		$criteria->compare('tn_address_three',$this->tn_address_three,true);
		$criteria->compare('tn_city',$this->tn_city);
		$criteria->compare('tn_state',$this->tn_state);
		$criteria->compare('tn_country',$this->tn_country);
		$criteria->compare('tn_website',$this->tn_website,true);
		$criteria->compare('tn_email',$this->tn_email,true);
		$criteria->compare('tn_created_at',$this->tn_created_at,true);
		$criteria->compare('tn_created_by',$this->tn_created_by);
		$criteria->compare('tn_status',$this->tn_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenants the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
