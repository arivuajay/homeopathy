<?php

/**
 * This is the model class for table "{{medicines}}".
 *
 * The followings are the available columns in table '{{medicines}}':
 * @property integer $tenant
 * @property integer $med_id
 * @property integer $med_cat_id
 * @property string $med_name
 * @property string $med_desc
 * @property string $med_status
 *
 * The followings are the available model relations:
 * @property MedStock[] $medStocks
 * @property MedicinePkg[] $medicinePkgs
 * @property Tenants $tenant0
 * @property MedCategories $medCat
 * @property PurchaseOrderMedicines[] $purchaseOrderMedicines
 * @property SalesOrderMedicines[] $salesOrderMedicines
 */
class Medicines extends RActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{medicines}}';
	}
        
        public function scopes() {
            $alias = $this->getTableAlias(false, false);
            return array(
                'isActive' => array('condition' => $alias . '.med_status  = "1"'),
            );
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant, med_cat_id, med_name', 'required'),
			array('tenant, med_cat_id', 'numerical', 'integerOnly'=>true),
			array('med_name', 'length', 'max'=>255),
			array('med_status', 'length', 'max'=>1),
			array('med_desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant, med_id, med_cat_id, med_name, med_desc, med_status', 'safe', 'on'=>'search'),
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
			'medStocks' => array(self::HAS_MANY, 'MedStock', 'stk_med_id'),
			'medicinePkgs' => array(self::HAS_MANY, 'MedicinePkg', 'pkg_med_id'),
			'tenant0' => array(self::BELONGS_TO, 'Tenants', 'tenant'),
			'medCat' => array(self::BELONGS_TO, 'MedCategories', 'med_cat_id'),
			'purchaseOrderMedicines' => array(self::HAS_MANY, 'PurchaseOrderMedicines', 'itm_med_id'),
			'salesOrderMedicines' => array(self::HAS_MANY, 'SalesOrderMedicines', 'itm_med_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant' => Myclass::t('APP78'),
			'med_id' => Myclass::t('APP69'),
			'med_cat_id' => Myclass::t('APP70'),
			'med_name' => Myclass::t('APP71'),
			'med_desc' => Myclass::t('APP72'),
			'med_status' => Myclass::t('APP73'),
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
		$criteria->compare('med_id',$this->med_id);
		$criteria->compare('med_cat_id',$this->med_cat_id);
		$criteria->compare('med_name',$this->med_name,true);
		$criteria->compare('med_desc',$this->med_desc,true);
		$criteria->compare('med_status',$this->med_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medicines the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
