<?php

//::Rajith:: SaaS
class RActiveRecord extends CActiveRecord {

    //saving model->tenant to all tables automatic ::Rajith::
    public function beforeSave() {
        $tenant = $this->getTenant();
        $this->tenant = $tenant;
        return parent::beforeSave();
    }

    //Find only tenant match by default ::Rajith::
    //use  defaultScope() or  beforeFind()
    //comment defaultScope(), if you using beforeFind()
    public function defaultScope() {
        $tenant = $this->getTenant();
        $alias = $this->getTableAlias(false,false);
        return array(
            'condition' => "$alias.tenant=:tenant",
            'params' => array(":tenant" => $tenant));
    }

    //Find only tenant match by default ::Rajith::
    //uncomment if you using beforeFind()
    /* public function beforeFind()
      {
      $tenant = $this->getTenant();

      $criteria = new CDbCriteria;
      $criteria->condition = "tenant=:tenant";
      $criteria->params = array(":tenant"=>$tenant);

      $this->dbCriteria->mergeWith($criteria);
      parent::beforeFind();
      } */



    //before deletion check for the ownership ::Rajith::
    //not working for deleteAllByAttributes
    public function beforeDelete() {

        $tenant = $this->getTenant();
        if ($this->tenant == $tenant) {
            return true;
        } else {

            return false; // prevent actual DELETE query from being run
        }
    }

    //to get the unique UNIQUE identifier
    public function getTenant()
    {
     return Yii::app()->user->getState('tenant');
    }
}
