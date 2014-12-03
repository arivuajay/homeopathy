<?php

class PatientsController extends Controller
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
            $model = new PatientProfile('search');
            if (isset($_GET['PatientProfile']))
                $model->attributes = $_GET['PatientProfile'];

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
	 
	 public function actionCreate() {
            $user_model = new Users;
            $model = new PatientProfile;
		
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($user_model, $model));

            if (isset($_POST['Users'])) {
                $user_model->attributes = $_POST['Users'];
                $model->attributes = $_POST['PatientProfile'];
                // validate BOTH models
                $valid = $user_model->validate();
                $valid = $model->validate() && $valid;
                if($valid) {
                    $user_model->ur_role_id = 8;
                    $user_model->ur_status = 1;
                    
                    $user_model->save(false);

                    $model->user_id = $user_model->ur_id;
                    $model->save(false);

                    $this->redirect(array('index'));
                }
            }

            $this->render('create', array(
                'model' => $model,
                'user_model' => $user_model,
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
            $user_model = Users::model()->findByAttributes(array('ur_id'=>$model->user_id));

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($user_model, $model));

            if(isset($_POST['PatientProfile'],$_POST['Users']))
            {
                $model->attributes=$_POST['PatientProfile'];
                $user_model->attributes=$_POST['Users'];
                // validate BOTH models
                $valid = $model->validate();
                $valid = $user_model->validate() && $valid;
                if($valid) {
                    $user_model->save(false);
                    $model->user_id = $user_model->ur_id;
                    $model->save(false);
                    $this->redirect(array('index'));
                }
            }

            $this->render('update',array(
                'model'=>$model,
                'user_model' => $user_model,
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
        public function actionDelete($id)
	{
            $patient_profile = $this->loadModel($id);
            $user = Users::model()->findByPk($patient_profile->user_id);
            $patient_profile->delete();
            $user->delete();            

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PatientProfile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PatientProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PatientProfile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='patient-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
