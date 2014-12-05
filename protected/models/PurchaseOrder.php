<?php

/**
 * This is the model class for table "{{purchase_order}}".
 *
 * The followings are the available columns in table '{{purchase_order}}':
 * @property integer $tenant
 * @property integer $po_id
 * @property string $po_date
 * @property integer $po_vendor
 * @property string $po_invoice
 * @property string $po_memo
 * @property string $po_total
 * @property string $po_paid
 * @property string $po_status
 * @property integer $po_created_by
 *
 * The followings are the available model relations:
 * @property Users $poCreatedBy
 * @property Tenants $tenant0
 * @property Vendors $poVendor
 * @property PurchaseOrderMedicines[] $purchaseOrderMedicines
 */
class PurchaseOrder extends RActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{purchase_order}}';
	}
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant, po_date, po_vendor, po_invoice, po_total, po_created_by', 'required'),
			array('tenant, po_vendor, po_created_by', 'numerical', 'integerOnly'=>true),
			array('po_invoice', 'length', 'max'=>100),
			array('po_total, po_paid', 'length', 'max'=>10),
			array('po_status', 'length', 'max'=>1),
			array('po_memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant, po_id, po_date, po_vendor, po_invoice, po_memo, po_total, po_paid, po_status, po_created_by', 'safe', 'on'=>'search'),
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
			'poCreatedBy' => array(self::BELONGS_TO, 'Users', 'po_created_by'),
			'tenant0' => array(self::BELONGS_TO, 'Tenants', 'tenant'),
			'poVendor' => array(self::BELONGS_TO, 'Vendors', 'po_vendor'),
			'purchaseOrderMedicines' => array(self::HAS_MANY, 'PurchaseOrderMedicines', 'itm_po_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant' => Myclass::t('APP78'),
			'po_id' => Myclass::t('APP86'),
			'po_date' => Myclass::t('APP87'),
			'po_vendor' => Myclass::t('APP88'),
			'po_invoice' => Myclass::t('APP89'),
			'po_memo' => Myclass::t('APP90'),
			'po_total' => Myclass::t('APP91'),
			'po_paid' => Myclass::t('APP92'),
			'po_status' => Myclass::t('APP55'),
			'po_created_by' => Myclass::t('APP93'),
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
//                $criteria->join = ' LEFT OUTER JOIN `hme_vendors` `poVendor` ON (`hme_purchase_order`.`po_vendor`=`poVendor`.`ven_id`)';
//                $criteria->with = array('poVendor');
//                $criteria->together = true;


		$criteria->compare('tenant',$this->tenant);
		$criteria->compare('po_id',$this->po_id);
		$criteria->compare('po_date',$this->po_date,true);
		$criteria->compare('poVendor.ven_name',$this->po_vendor,true);
		$criteria->compare('po_invoice',$this->po_invoice,true);
		$criteria->compare('po_memo',$this->po_memo,true);
		$criteria->compare('po_total',$this->po_total,true);
		$criteria->compare('po_paid',$this->po_paid,true);
		$criteria->compare('po_status',$this->po_status,true);
		$criteria->compare('po_created_by',$this->po_created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
