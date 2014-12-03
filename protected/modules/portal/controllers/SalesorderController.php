<?php

class SalesorderController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'loadcustomers', 'medicineadd'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
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
        $model = new SalesOrder('search');
        if (isset($_GET['SalesOrder']))
            $model->attributes = $_GET['SalesOrder'];

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
        $model = new SalesOrder;
        $sale_medicines = new SalesOrderMedicines;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['SalesOrder'])) {
            $model->attributes = $_POST['SalesOrder'];
            $valid = $model->validate();
            
            foreach ($_POST['SalesOrderMedicines'] as $key => $data) {
                $s_med = new SalesOrderMedicines('medicine_add');
                $s_med->attributes = $data;
                $valid = $s_med->validate() && $valid;
            }
            
            if($valid){
                if ($model->save(false)){
                    foreach ($_POST['SalesOrderMedicines'] as $key => $data) {
                        $data['itm_so_id'] = $model->so_id;
                        unset($data['r_index']);
                        $s_med = new SalesOrderMedicines('medicine_add');
                        $s_med->attributes = $data;
                        $s_med->save(false);
                    }
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'sale_medicines' => $sale_medicines
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $sale_medicines = new SalesOrderMedicines;
        $sales_medicine_list = SalesOrderMedicines::model()->findAll("itm_so_id = :SO_ID", array(':SO_ID' => $id));
        
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['SalesOrder'])) {
            $model->attributes = $_POST['SalesOrder'];
            $valid = $model->validate();
            
            $post_ids = array();
            foreach ($_POST['SalesOrderMedicines'] as $key => $data) {
                $s_med = new SalesOrderMedicines('medicine_add');
                $s_med->attributes = $data;
                $valid = $s_med->validate() && $valid;
                $post_ids[] = $data['itm_id'];
            }
            
            if($valid){
                $med_ids = array();
                foreach ($sales_medicine_list as $medicine) {
                    $med_ids[] = $medicine->attributes['itm_id'];
                }
                $delete_med = array_diff($med_ids, $post_ids);
                
                if ($model->save(false))
                    foreach ($_POST['SalesOrderMedicines'] as $key => $data) {
                        $data['itm_so_id'] = $id;
                        if (isset($data['itm_id'])) {
                            $p_med = SalesOrderMedicines::model()->findByPk($data['itm_id']);
                            $p_med->attributes = $data;
                            $p_med->update();
                        } else {
                            $p_med = new SalesOrderMedicines('medicine_add');;
                            $p_med->attributes = $data;
                            $p_med->save(false);
                        }
                    }
                    //delete medicine list
                    foreach ($delete_med as $id) {
                        SalesOrderMedicines::model()->findByPk($id)->delete();
                    }

                    $this->redirect(array('index'));
                
            }
        }

        $this->render('update', array(
            'model' => $model,
            'sale_medicines' => $sale_medicines,
            'sales_medicine_list' => $sales_medicine_list
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
     * @return SalesOrder the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SalesOrder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionMedicineadd() {
        $sales_medicines = new SalesOrderMedicines('medicine_add');
        $this->performAjaxValidation($sales_medicines);
        $sales_medicines->attributes = $_POST['SalesOrderMedicines'];
        $valid = $sales_medicines->validate();

        if ($valid)
            echo json_encode($_POST['SalesOrderMedicines']);
        Yii::app()->end();
    }

    public function actionLoadcustomers($type) {
        if ($type == '1') {
            $patients_list = CHtml::listData(PatientProfile::model()->with('user')->findAll("ur_status = :STATUS", array(":STATUS" => '1')), 'pt_id', 'pt_firstname');
            $model = new SalesOrder;
            echo CHtml::activeDropDownList($model, 'so_user', $patients_list, array(
                'class' => 'form-control',
                'empty' => Myclass::t('APP205'),
            ));
        } else if ($type == '2') {
            $vendors = CHtml::listData(Vendors::model()->findAll('ven_status = :status', array(':status' => '1')), 'ven_id', 'ven_name');
            $model = new SalesOrder;
            echo CHtml::activeDropDownList($model, 'so_user', $vendors, array(
                'class' => 'form-control',
                'empty' => Myclass::t('APP205'),
            ));
        }

        Yii::app()->end();
    }

    /**
     * Performs the AJAX validation.
     * @param SalesOrder $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'sales-order-form'  || $_POST['ajax'] === 'medicine-form')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
