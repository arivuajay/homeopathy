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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'add_medicine_entry', 'medicineadd'),
                'users' => array('*'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new PurchaseOrder('search');
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
        $this->performAjaxValidation(array($model,$purchase_medicines));
        
        if (isset($_POST['PurchaseOrderMedicines'])) {
            $purchase_medicines->attributes = $_POST['PurchaseOrderMedicines'];
            $valid = $purchase_medicines->validate();

            if($valid)
                echo 'success';
            Yii::app()->end();
        }
/*        if (isset($_POST['PurchaseOrder'])) {
            $model->attributes = $_POST['PurchaseOrder'];
            if ($model->save())
                $this->redirect(array('index'));
        }
*/
        $this->render('create', array(
            'model' => $model,
            'purchase_medicines' => $purchase_medicines
        ));
    }
    
    public function ActionMedicineadd() {
        $purchase_medicines = new PurchaseOrderMedicines('medicine_add');
        $purchase_medicines->attributes = $_POST['PurchaseOrderMedicines'];
        $valid = $purchase_medicines->validate();
        
        if($valid)
            echo 'success';
        Yii::app()->end();
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseOrder'])) {
            $model->attributes = $_POST['PurchaseOrder'];
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model' => $model,
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
