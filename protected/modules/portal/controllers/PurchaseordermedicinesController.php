<?php

class PurchaseordermedicinesController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'view', 'create', 'update', 'delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Lists all models.
	 */
        public function actionIndex() {
            $model = new PurchaseOrderMedicines('search');
            $model->setAttribute('itm_manf_date', '');
            $model->setAttribute('itm_exp_date', '');
            $po_vendor = Vendors::model()->find('self_user_id = :self', array(':self' => Yii::app()->user->getState('tenant')));
            $model->setAttribute('self', $po_vendor->attributes['ven_id']);
            
            if (isset($_GET['PurchaseOrderMedicines']))
                $model->attributes = $_GET['PurchaseOrderMedicines'];

            if (isset($_GET['pageSize'])) {
                Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
                unset($_GET['pageSize']);
            }

            $params = array(
                'model' => $model,
                'pageSize' =>  Yii::app()->user->getState('pageSize', Yii::app()->params['DEFAULT_PAGE_SIZE'])
            );

            if (!isset($_GET['ajax']))
                $this->render('index', $params);
            else
                $this->renderPartial('index', $params);
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $model=new PurchaseOrderMedicines('medicine_add');

            $po_vendor = Vendors::model()->find('self_user_id = :self', array(':self' => Yii::app()->user->getState('tenant')));
            $po = PurchaseOrder::model()->find('po_vendor = :vendor', array(':vendor' => $po_vendor->attributes['ven_id']));
            
            $model->setAttribute('self', $po_vendor->attributes['ven_id']);

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['PurchaseOrderMedicines']))
            {
                if(empty($po)){
                    $po = new PurchaseOrder;
                    $po->setAttribute('tenant', $po_vendor->attributes['tenant']);
                    $po->setAttribute('po_date',  date('Y-m-d'));
                    $po->setAttribute('po_vendor', $po_vendor->attributes['ven_id']);
                    $po->setAttribute('po_invoice', Myclass::t("APP247"));
                    $po->setAttribute('po_created_by', $po_vendor->attributes['tenant']);
                    
                    $po->save(false);
                }
                
                $model->attributes = $_POST['PurchaseOrderMedicines'];
                $model->setAttribute('itm_po_id', $po->po_id);
                $valid = $model->validate();
                
                if($valid){
                    /*
                    $check_open_stk = PurchaseOrderMedicines::model()->find("itm_po_id = :po_id "
                                                                            . "And itm_med_id = :med_id "
                                                                            . "And itm_pkg_id = :pkg_id "
                                                                            . "And itm_batch_no = :batch "
                                                                            . "And itm_manf_date = :itm_manf_date "
                                                                            . "And itm_exp_date = :itm_manf_date",
                                                                            array(
                                                                                ':po_id' => $model->itm_po_id,
                                                                                ':med_id' => $model->itm_med_id,
                                                                                ':pkg_id' => $model->itm_pkg_id,
                                                                                ':batch' => $model->itm_batch_no,
                                                                                ':itm_manf_date' => $model->itm_manf_date,
                                                                                ':itm_exp_date' => $model->itm_exp_date,
                                                                            )
                                                                            );
                    
                    */
                    if($model->save(false))
                        Yii::app()->user->setFlash('success', Myclass::t('APP476'));
                        $this->redirect(array('create'));
                }else{
                    $model->getErrors();
                }
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PurchaseOrderMedicines']))
		{
			$model->attributes=$_POST['PurchaseOrderMedicines'];
                        $model->setAttribute('itm_po_id', $model->itmPo->po_id);
                        
                        $valid = $model->validate();
                        
                        if($valid){
                            if($model->save())
                                Yii::app()->user->setFlash('success', Myclass::t('APP477'));
                                $this->redirect(array('index'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
                    Yii::app()->user->setFlash('success', Myclass::t('APP478'));
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PurchaseOrderMedicines the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PurchaseOrderMedicines::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PurchaseOrderMedicines $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchase-order-medicines-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
