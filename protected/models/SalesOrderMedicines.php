<?php

/**
 * This is the model class for table "{{sales_order_medicines}}".
 *
 * The followings are the available columns in table '{{sales_order_medicines}}':
 * @property integer $itm_id
 * @property integer $itm_so_id
 * @property integer $itm_med_id
 * @property integer $itm_pkg_id
 * @property string $itm_batch_no
 * @property string $itm_vat_tax
 * @property string $itm_mrp_price
 * @property string $itm_discount
 * @property string $itm_net_rate
 * @property integer $itm_qty
 * @property string $itm_total_price
 *
 * The followings are the available model relations:
 * @property MedicinePkg $itmPkg
 * @property Medicines $itmMed
 * @property SalesOrder $itmSo
 */
class SalesOrderMedicines extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{sales_order_medicines}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itm_so_id, itm_med_id, itm_pkg_id, itm_batch_no, itm_qty', 'required'),
			array('itm_so_id, itm_med_id, itm_pkg_id, itm_qty', 'numerical', 'integerOnly'=>true),
			array('itm_batch_no', 'length', 'max'=>150),
			array('itm_vat_tax, itm_mrp_price, itm_discount, itm_net_rate, itm_total_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('itm_id, itm_so_id, itm_med_id, itm_pkg_id, itm_batch_no, itm_vat_tax, itm_mrp_price, itm_discount, itm_net_rate, itm_qty, itm_total_price', 'safe', 'on'=>'search'),
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
			'itmPkg' => array(self::BELONGS_TO, 'MedicinePkg', 'itm_pkg_id'),
			'itmMed' => array(self::BELONGS_TO, 'Medicines', 'itm_med_id'),
			'itmSo' => array(self::BELONGS_TO, 'SalesOrder', 'itm_so_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'itm_id' => 'Itm',
			'itm_so_id' => 'Relatrion to sales_order',
			'itm_med_id' => 'Relatrion to medicines',
			'itm_pkg_id' => 'Relatrion to med_package',
			'itm_batch_no' => 'Itm Batch No',
			'itm_vat_tax' => 'Itm Vat Tax',
			'itm_mrp_price' => 'Itm Mrp Price',
			'itm_discount' => 'Itm Discount',
			'itm_net_rate' => 'Itm Net Rate',
			'itm_qty' => 'Itm Qty',
			'itm_total_price' => 'Itm Total Price',
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

		$criteria->compare('itm_id',$this->itm_id);
		$criteria->compare('itm_so_id',$this->itm_so_id);
		$criteria->compare('itm_med_id',$this->itm_med_id);
		$criteria->compare('itm_pkg_id',$this->itm_pkg_id);
		$criteria->compare('itm_batch_no',$this->itm_batch_no,true);
		$criteria->compare('itm_vat_tax',$this->itm_vat_tax,true);
		$criteria->compare('itm_mrp_price',$this->itm_mrp_price,true);
		$criteria->compare('itm_discount',$this->itm_discount,true);
		$criteria->compare('itm_net_rate',$this->itm_net_rate,true);
		$criteria->compare('itm_qty',$this->itm_qty);
		$criteria->compare('itm_total_price',$this->itm_total_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesOrderMedicines the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
