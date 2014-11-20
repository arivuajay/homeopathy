<?php

/**
 * This is the model class for table "{{med_categories}}".
 *
 * The followings are the available columns in table '{{med_categories}}':
 * @property integer $med_cat_id
 * @property string $med_cat_name
 * @property integer $med_cat_parent
 * @property string $med_cat_unit
 * @property string $med_cat_desc
 * @property string $med_cat_status
 *
 * The followings are the available model relations:
 * @property Medicines[] $medicines
 */
class MedCategories extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{med_categories}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => $alias . '.med_cat_status  = "1"'),
            'isParent' => array('condition' => $alias . '.med_cat_parent IS NULL'),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('med_cat_name, med_cat_unit, med_cat_desc', 'required'),
            array('med_cat_parent', 'numerical', 'integerOnly' => true),
            array('med_cat_name', 'length', 'max' => 100),
            array('med_cat_unit, med_cat_status', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('med_cat_id, med_cat_name, med_cat_parent, med_cat_unit, med_cat_desc, med_cat_status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'medicines' => array(self::HAS_MANY, 'Medicines', 'med_cat_id'),
            'medparcat' => array(self::BELONGS_TO, 'MedCategories', 'med_cat_parent'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'med_cat_name' => Myclass::t('APP51'),
            'med_cat_parent' => Myclass::t('APP52'),
            'med_cat_unit' => Myclass::t('APP53'),
            'med_cat_desc' => Myclass::t('APP54'),
            'med_cat_status' => Myclass::t('APP55'),
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

        $criteria->compare('med_cat_id', $this->med_cat_id);
        $criteria->compare('med_cat_name', $this->med_cat_name, true);
        $criteria->compare('med_cat_parent', $this->med_cat_parent);
        $criteria->compare('med_cat_unit', $this->med_cat_unit, true);
        $criteria->compare('med_cat_desc', $this->med_cat_desc, true);
        $criteria->compare('med_cat_status', $this->med_cat_status, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['DEFAULT_PAGE_SIZE']),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MedCategories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
