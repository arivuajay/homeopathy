<?php

class PurchaseorderController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'add_medicine_entry', 'medicineadd', 'loadmedrate', 'openingstock'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * @return array actions
     */
    public function actions() {
        return array(
            'add_medicine_entry' => array(
                'class' => 'ext.actions.XTabularInputAction',
                'modelName' => 'PurchaseOrderMedicines',
                'viewName' => '_purchase_medicine_form',
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $purchase_medicine_list = PurchaseOrderMedicines::model()->findAll("itm_po_id = :PO_ID", array(':PO_ID' => $id));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'purchase_medicine_list' => $purchase_medicine_list
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new PurchaseOrder('search');
        $model->setAttribute('po_status','');
        if (isset($_GET['PurchaseOrder']))
            $model->attributes = $_GET['PurchaseOrder'];

        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }

        $params = array(
            'model' => $model,
            'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['DEFAULT_PAGE_SIZE'])
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
    public function actionCreate() {
        $model = new PurchaseOrder;
        $purchase_medicines = new PurchaseOrderMedicines('medicine_add');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        
        if (isset($_POST['PurchaseOrder'])) {
            $model->attributes = $_POST['PurchaseOrder'];
            $valid = $model->validate();
            
            foreach ($_POST['PurchaseOrderMedicines'] as $key => $data) {
                $p_med = new PurchaseOrderMedicines('medicine_add');
                $p_med->attributes = $data;
                $valid = $p_med->validate() && $valid;
            }
            
            if($valid){
                if ($model->save(false))
                    foreach ($_POST['PurchaseOrderMedicines'] as $key => $data) {
                        $data['itm_po_id'] = $model->po_id;
                        unset($data['r_index']);
                        $p_med = new PurchaseOrderMedicines('medicine_add');
                        $p_med->attributes = $data;
                        $p_med->save(false);
                    }
                    Yii::app()->user->setFlash('success', Myclass::t('APP467'));
                    $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'purchase_medicines' => $purchase_medicines
        ));
    }
    
    public function actionMedicineadd() {
        $purchase_medicines = new PurchaseOrderMedicines('medicine_add');
        
        $this->performAjaxValidation($purchase_medicines);
        $purchase_medicines->attributes = $_POST['PurchaseOrderMedicines'];
        $valid = $purchase_medicines->validate();
        
        if($valid)
            echo json_encode ($_POST['PurchaseOrderMedicines']);
        Yii::app()->end();
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = PurchaseOrder::model()->with('poVendor')->excptSelf()->findByPk($id);
        
        if(empty($model))
            throw new CHttpException(404,'The specified post cannot be found.');
        
        $purchase_medicines = new PurchaseOrderMedicines('medicine_add');
        $purchase_medicine_list = PurchaseOrderMedicines::model()->findAll("itm_po_id = :PO_ID", array(':PO_ID' => $id));
        
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseOrder'])) {
            $model->attributes = $_POST['PurchaseOrder'];
            $valid = $model->validate();
            
            $post_ids = array();
            foreach ($_POST['PurchaseOrderMedicines'] as $key => $data) {
                $p_med = new PurchaseOrderMedicines('medicine_add');
                $p_med->attributes = $data;
                $valid = $p_med->validate() && $valid;
                $post_ids[] = $data['itm_id'];
            }
            
            if($valid){
                $med_ids = array();
                foreach ($purchase_medicine_list as $medicine) {
                    $med_ids[] = $medicine->attributes['itm_id'];
                }
                $delete_med = array_diff($med_ids, $post_ids);
                
                if ($model->save(false))
                    foreach ($_POST['PurchaseOrderMedicines'] as $key => $data) {
                        $data['itm_po_id'] = $id;
                        if (isset($data['itm_id'])) {
                            $p_med = PurchaseOrderMedicines::model()->findByPk($data['itm_id']);
                            $p_med->attributes = $data;
                            $p_med->update();
                        } else {
                            $p_med = new PurchaseOrderMedicines('medicine_add');;
                            $p_med->attributes = $data;
                            $p_med->save(false);
                        }
                    }
                    //delete medicine list
                    foreach ($delete_med as $id) {
                        PurchaseOrderMedicines::model()->findByPk($id)->delete();
                    }
                    Yii::app()->user->setFlash('success', Myclass::t('APP468'));
                    $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'purchase_medicines' => $purchase_medicines,
            'purchase_medicine_list' => $purchase_medicine_list
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            Yii::app()->user->setFlash('success', Myclass::t('APP469'));
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PurchaseOrder the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PurchaseOrder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionLoadmedrate($batch_no) {
        $medicine = PurchaseOrderMedicines::model()->find('itm_batch_no = :batch order by itm_id desc ', array(':batch' => $batch_no));
        $return = array();
        $return['mrp'] = $medicine->attributes['itm_mrp_price'];
        $return['vat'] = $medicine->attributes['itm_vat_tax'];
        $return['disc'] = $medicine->attributes['itm_discount'];
        $return['net_rate'] = $medicine->attributes['itm_net_rate'];
        echo json_encode($return);
        Yii::app()->end();
    }
    
    /**
     * Performs the AJAX validation.
     * @param PurchaseOrder $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'purchase-order-form' || $_POST['ajax'] === 'medicine-form')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
