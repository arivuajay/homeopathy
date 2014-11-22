<?php

/**
 * This is the model class for table "{{vendors}}".
 *
 * The followings are the available columns in table '{{vendors}}':
 * @property integer $tenant
 * @property integer $ven_id
 * @property string $ven_name
 * @property string $ven_address
 * @property string $ven_phone_no
 * @property string $ven_email
 * @property string $ven_status
 * @property integer $ven_created_by
 * @property string $ven_created_at
 *
 * The followings are the available model relations:
 * @property PurchaseOrder[] $purchaseOrders
 */
class Vendors extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{vendors}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => $alias . '.ven_status  = "1"'),
        );
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tenant, ven_name, ven_created_by, ven_created_at', 'required'),
            array('tenant, ven_created_by', 'numerical', 'integerOnly' => true),
            array('ven_name', 'length', 'max' => 255),
            array('ven_phone_no, ven_email', 'length', 'max' => 150),
            array('ven_email', 'email'),
            array('ven_status', 'length', 'max' => 1),
            array('ven_address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tenant, ven_id, ven_name, ven_address, ven_phone_no, ven_email, ven_status, ven_created_by, ven_created_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'purchaseOrders' => array(self::HAS_MANY, 'PurchaseOrder', 'po_vendor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tenant' => Myclass::t('APP78'),
            'ven_id' => Myclass::t('APP95'),
            'ven_name' => Myclass::t('APP96'),
            'ven_address' => Myclass::t('APP97'),
            'ven_phone_no' => Myclass::t('APP119'),
            'ven_email' => Myclass::t('APP98'),
            'ven_status' => Myclass::t('APP55'),
            'ven_created_by' => Myclass::t('APP93'),
            'ven_created_at' => Myclass::t('APP99'),
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('tenant', $this->tenant);
        $criteria->compare('ven_id', $this->ven_id);
        $criteria->compare('ven_name', $this->ven_name, true);
        $criteria->compare('ven_address', $this->ven_address, true);
        $criteria->compare('ven_phone_no', $this->ven_phone_no, true);
        $criteria->compare('ven_email', $this->ven_email, true);
        $criteria->compare('ven_status', $this->ven_status, true);
        $criteria->compare('ven_created_by', $this->ven_created_by);
        $criteria->compare('ven_created_at', $this->ven_created_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Vendors the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
