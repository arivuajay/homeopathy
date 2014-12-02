<?php

/**
 * This is the model class for table "{{medicine_pkg}}".
 *
 * The followings are the available columns in table '{{medicine_pkg}}':
 * @property integer $pkg_id
 * @property integer $pkg_med_id
 * @property integer $pkg_med_unit
 * @property integer $pkg_med_power
 *
 * The followings are the available model relations:
 * @property MedStock[] $medStocks
 * @property Medicines $pkgMed
 * @property PurchaseOrderMedicines[] $purchaseOrderMedicines
 * @property SalesOrderMedicines[] $salesOrderMedicines
 */
class MedicinePkg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{medicine_pkg}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pkg_med_unit', 'required'),
			array('pkg_med_id', 'numerical', 'integerOnly'=>true),
			array('pkg_med_unit, pkg_med_power', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pkg_id, pkg_med_id, pkg_med_unit, pkg_med_power', 'safe', 'on'=>'search'),
			array('pkg_med_id, pkg_med_unit', 'required', 'on'=>'create'),
			array('pkg_id, pkg_med_id, pkg_med_unit', 'required', 'on'=>'update'),
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
			'medStocks' => array(self::HAS_MANY, 'MedStock', 'stk_pkg_id'),
			'pkgMed' => array(self::BELONGS_TO, 'Medicines', 'pkg_med_id'),
			'purchaseOrderMedicines' => array(self::HAS_MANY, 'PurchaseOrderMedicines', 'itm_pkg_id'),
			'salesOrderMedicines' => array(self::HAS_MANY, 'SalesOrderMedicines', 'itm_pkg_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkg_id' => 'Pkg',
			'pkg_med_id' => 'Pkg Med',
			'pkg_med_unit' => 'Pkg Med Unit',
			'pkg_med_power' => 'Pkg Med Power',
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

		$criteria->compare('pkg_id',$this->pkg_id);
		$criteria->compare('pkg_med_id',$this->pkg_med_id);
		$criteria->compare('pkg_med_unit',$this->pkg_med_unit);
		$criteria->compare('pkg_med_power',$this->pkg_med_power);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MedicinePkg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
