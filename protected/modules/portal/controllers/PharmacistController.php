<?php

class PharmacistController extends Controller
{
        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

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
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('index', 'view', 'create', 'update'),
                    'users' => array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions' => array('admin', 'delete'),
                    'users' => array('admin'),
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
            $model = new PharmacistProfile('search');
            if (isset($_GET['PharmacistProfile']))
                $model->attributes = $_GET['PharmacistProfile'];

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
            $model = new Users;
            $profileModel = new PharmacistProfile;

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($model, $profileModel));
            
            if (isset($_POST['Users'])) {
                $model->attributes = $_POST['Users'];
                $profileModel->attributes = $_POST['PharmacistProfile'];
                // validate BOTH models
                $valid = $model->validate();
                $valid = $profileModel->validate() && $valid;
                //echo $valid; exit;
                if($valid) {
                    $model->ur_role_id = 10;
                    $model->ur_status = 1;
                    
                    $model->save(false);

                    $profileModel->user_id = $model->ur_id;
                    $profileModel->save(false);

                    $this->redirect(array('view', 'id' => $model->ur_id));
                }
            }

            $this->render('create', array(
                'model' => $model,
                'profileModel' => $profileModel,
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $profileModel= $this->loadModel($id);
            $model=Users::model()->findByPk($profileModel->user_id);
            
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($model, $profileModel));
            
            if (isset($_POST['Users'])) {
                $model->attributes = $_POST['Users'];
                $profileModel->attributes = $_POST['PharmacistProfile'];
                // validate BOTH models
                $valid = $model->validate();
                $valid = $profileModel->validate() && $valid;
                //echo $valid; exit;
                if($valid) {
                    
                    $model->save(false);

                    $profileModel->user_id = $model->ur_id;
                    $profileModel->save(false);

                    $this->redirect(array('view', 'id' => $model->ur_id));
                }
            }

            $this->render('update', array(
                'model' => $model,
                'profileModel' => $profileModel
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PharmacistProfile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PharmacistProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PharmacistProfile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pharmacist-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
