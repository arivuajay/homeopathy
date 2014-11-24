<?php

class MedicinepkgController extends Controller
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
				'actions'=>array('index', 'view', 'create', 'update', 'delete','loadpackages'),
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
            $model = new MedicinePkg('search');
            if (isset($_GET['MedicinePkg']))
                $model->attributes = $_GET['MedicinePkg'];

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
		$model=new MedicinePkg;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MedicinePkg']))
		{
			$model->attributes=$_POST['MedicinePkg'];
			if($model->save())
				$this->redirect(array('index'));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['MedicinePkg']))
		{
			$model->attributes=$_POST['MedicinePkg'];
			if($model->save())
				$this->redirect(array('index'));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MedicinePkg the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MedicinePkg::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
                
        public function actionLoadpackages($med_id) {
            $packages = CHtml::listData(MedicinePkg::model()->findAll('pkg_med_id = :med_id',array(':med_id'=>$med_id)), 'pkg_id', 'pkg_med_unit');
            $model = new PurchaseOrderMedicines;
            echo CHtml::activeDropDownList($model, 'itm_pkg_id', $packages, array('class'=>'form-control','empty'=>Myclass::t('APP205')));
            Yii::app()->end();
        }

	/**
	 * Performs the AJAX validation.
	 * @param MedicinePkg $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='medicine-pkg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
