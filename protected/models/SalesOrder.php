<?php

/**
 * This is the model class for table "{{sales_order}}".
 *
 * The followings are the available columns in table '{{sales_order}}':
 * @property integer $tenant
 * @property integer $so_id
 * @property string $so_type
 * @property string $so_date
 * @property integer $so_user
 * @property integer $so_doctor
 * @property string $so_memo
 * @property string $so_total
 * @property string $so_paid
 * @property string $so_status
 *
 * The followings are the available model relations:
 * @property Tenants $tenant0
 * @property SalesOrderMedicines[] $salesOrderMedicines
 */
class SalesOrder extends RActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{sales_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant, so_date, so_total', 'required'),
			array('tenant, so_user, so_doctor', 'numerical', 'integerOnly'=>true),
			array('so_type, so_status', 'length', 'max'=>1),
			array('so_total, so_paid', 'length', 'max'=>10),
			array('so_memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant, so_id, so_type, so_date, so_user, so_doctor, so_memo, so_total, so_paid, so_status', 'safe', 'on'=>'search'),
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
			'tenant0' => array(self::BELONGS_TO, 'Tenants', 'tenant'),
			'salesOrderMedicines' => array(self::HAS_MANY, 'SalesOrderMedicines', 'itm_so_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant' => Myclass::t('APP78'),
			'so_id' => Myclass::t('APP231'),
			'so_type' => Myclass::t('APP233'),
			'so_date' => Myclass::t('APP232'),
			'so_user' => Myclass::t('APP237'),
			'so_doctor' => Myclass::t('APP235'),
			'so_memo' => Myclass::t('APP90'),
			'so_total' => Myclass::t('APP91'),
			'so_paid' => Myclass::t('APP92'),
			'so_status' => Myclass::t('APP55'),
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
		$criteria->compare('so_id',$this->so_id);
		$criteria->compare('so_type',$this->so_type,true);
		$criteria->compare('so_date',$this->so_date,true);
		$criteria->compare('so_user',$this->so_user);
		$criteria->compare('so_doctor',$this->so_doctor);
		$criteria->compare('so_memo',$this->so_memo,true);
		$criteria->compare('so_total',$this->so_total,true);
		$criteria->compare('so_paid',$this->so_paid,true);
		$criteria->compare('so_status',$this->so_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
