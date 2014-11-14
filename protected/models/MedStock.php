<?php

/**
 * This is the model class for table "{{med_stock}}".
 *
 * The followings are the available columns in table '{{med_stock}}':
 * @property integer $tenant
 * @property integer $stk_id
 * @property integer $stk_med_id
 * @property integer $stk_pkg_id
 * @property string $stk_batch_no
 * @property integer $stk_avail_units
 * @property integer $stk_debit_units
 *
 * The followings are the available model relations:
 * @property Tenants $tenant0
 * @property Medicines $stkMed
 * @property MedicinePkg $stkPkg
 */
class MedStock extends RActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{med_stock}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant, stk_med_id, stk_pkg_id', 'required'),
			array('tenant, stk_med_id, stk_pkg_id, stk_avail_units, stk_debit_units', 'numerical', 'integerOnly'=>true),
			array('stk_batch_no', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant, stk_id, stk_med_id, stk_pkg_id, stk_batch_no, stk_avail_units, stk_debit_units', 'safe', 'on'=>'search'),
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
			'stkMed' => array(self::BELONGS_TO, 'Medicines', 'stk_med_id'),
			'stkPkg' => array(self::BELONGS_TO, 'MedicinePkg', 'stk_pkg_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant' => 'Tenant',
			'stk_id' => 'Stk',
			'stk_med_id' => 'Stk Med',
			'stk_pkg_id' => 'Stk Pkg',
			'stk_batch_no' => 'Stk Batch No',
			'stk_avail_units' => 'Stk Avail Units',
			'stk_debit_units' => 'Stk Debit Units',
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
		$criteria->compare('stk_id',$this->stk_id);
		$criteria->compare('stk_med_id',$this->stk_med_id);
		$criteria->compare('stk_pkg_id',$this->stk_pkg_id);
		$criteria->compare('stk_batch_no',$this->stk_batch_no,true);
		$criteria->compare('stk_avail_units',$this->stk_avail_units);
		$criteria->compare('stk_debit_units',$this->stk_debit_units);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MedStock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
