<?php

class DoctorsController extends Controller {
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Users;
        $profModel = new DoctorProfile;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model,$profModel));

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $profModel->attributes = $_POST['DoctorProfile'];
            // validate BOTH models
            $valid = $model->validate();
            $valid = $profModel->validate() && $valid;
            if($valid) {
                $model->ur_role_id = 9;
                $model->ur_status = 1;
				$model->ur_password = Myclass::encrypt($model->ur_password);
                $model->save(false);

                $profModel->user_id = $model->ur_id;
                $profModel->save(false);

                $this->redirect(array('view', 'id' => $model->ur_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'profModel' => $profModel,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        //$profModel = new DoctorProfile;
		 $profModel = DoctorProfile::model()->findByAttributes(array('user_id'=>$id));
        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if (isset($_POST['Users'],$_POST['DoctorProfile'])) {
           $model->attributes = $_POST['Users'];
            $profModel->attributes = $_POST['DoctorProfile'];
            // validate BOTH models
            $valid = $model->validate();
            $valid = $profModel->validate() && $valid;
            if($valid) {
             //   $model->ur_role_id = 9;
              //  $model->ur_status = 1;
                $model->save(false);

                $profModel->user_id = $model->ur_id;
                $profModel->save(false);

                $this->redirect(array('view', 'id' => $model->ur_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
			'profModel' => $profModel,
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
     * Lists all models.
     */
    public function actionIndex() {
		
       $model = new DoctorProfile('search');
       
        if (isset($_GET['DoctorProfile']))
            $model->attributes = $_GET['DoctorProfile'];
        
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
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'doctors-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
