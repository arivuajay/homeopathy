<?php

/**
 * This is the model class for table "{{purchase_order_medicines}}".
 *
 * The followings are the available columns in table '{{purchase_order_medicines}}':
 * @property integer $itm_id
 * @property integer $itm_po_id
 * @property integer $itm_med_id
 * @property integer $itm_pkg_id
 * @property string $itm_batch_no
 * @property string $itm_manf_date
 * @property string $itm_exp_date
 * @property string $itm_vat_tax
 * @property string $itm_mrp_price
 * @property string $itm_discount
 * @property string $itm_net_rate
 * @property integer $itm_qty
 * @property string $itm_total_price
 *
 * The followings are the available model relations:
 * @property Medicines $itmMed
 * @property MedicinePkg $itmPkg
 * @property PurchaseOrder $itmPo
 */
class PurchaseOrderMedicines extends CActiveRecord
{
        public $itm_med_name;
        public $itm_pkg_name;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{purchase_order_medicines}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itm_med_id, itm_pkg_id, itm_batch_no, itm_qty', 'required'),
			array('itm_po_id, itm_med_id, itm_pkg_id, itm_qty', 'numerical', 'integerOnly'=>true),
			array('itm_batch_no', 'length', 'max'=>150),
			array('itm_vat_tax, itm_mrp_price, itm_discount, itm_net_rate, itm_total_price', 'length', 'max'=>10),
			array('itm_manf_date, itm_exp_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('itm_id, itm_po_id, itm_med_id, itm_pkg_id, itm_batch_no, itm_manf_date, itm_exp_date, itm_vat_tax, itm_mrp_price, itm_discount, itm_net_rate, itm_qty, itm_total_price', 'safe', 'on'=>'search'),
			array('itm_med_id, itm_pkg_id, itm_batch_no, itm_manf_date, itm_exp_date, itm_qty', 'required', 'on'=>'medicine_add'),
                        array('itm_med_name, itm_pkg_name','length')
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
			'itmMed' => array(self::BELONGS_TO, 'Medicines', 'itm_med_id'),
			'itmPkg' => array(self::BELONGS_TO, 'MedicinePkg', 'itm_pkg_id'),
			'itmPo' => array(self::BELONGS_TO, 'PurchaseOrder', 'itm_po_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'itm_id' => Myclass::t('APP212'),
			'itm_po_id' => Myclass::t('APP94'),
			'itm_med_id' => Myclass::t('APP68'),
			'itm_pkg_id' => Myclass::t('APP75'),
			'itm_batch_no' => Myclass::t('APP201'),
			'itm_manf_date' => Myclass::t('APP202'),
			'itm_exp_date' => Myclass::t('APP203'),
			'itm_vat_tax' => Myclass::t('APP208'),
			'itm_mrp_price' => Myclass::t('APP207'),
			'itm_discount' => Myclass::t('APP209'),
			'itm_net_rate' => Myclass::t('APP210'),
			'itm_qty' => Myclass::t('APP206'),
			'itm_total_price' => Myclass::t('APP211'),
                        'itm_med_name' => Myclass::t('APP214'),
                        'itm_pkg_name' => Myclass::t('APP77'),
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
		$criteria->compare('itm_po_id',$this->itm_po_id);
		$criteria->compare('itm_med_id',$this->itm_med_id);
		$criteria->compare('itm_pkg_id',$this->itm_pkg_id);
		$criteria->compare('itm_batch_no',$this->itm_batch_no,true);
		$criteria->compare('itm_manf_date',$this->itm_manf_date,true);
		$criteria->compare('itm_exp_date',$this->itm_exp_date,true);
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
	 * @return PurchaseOrderMedicines the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
