<?php

class MedicinesController extends Controller {

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
                'actions' => array(),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'add_package'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('admin'),
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
            'add_package' => array(
                'class' => 'ext.actions.XTabularInputAction',
                'modelName' => 'MedicinePkg',
                'viewName' => '_package_form',
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
        $model = new Medicines;
        $package = new MedicinePkg;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Medicines'])) {
            $model->attributes = $_POST['Medicines'];
            $valid = $model->validate();

//            foreach ($_POST['MedicinePkg'] as $key => $data) {
//                $package = new MedicinePkg;
//                $package->attributes = $data;
//                $valid = $package->validate() && $valid;
//            }

            if ($valid) {
                if ($model->save())
                    foreach ($_POST['MedicinePkg'] as $key => $data) {
                        $data['pkg_med_id'] = $model->med_id;

                        $package = new MedicinePkg;
                        $package->attributes = $data;
                        $package->save();
                    }
                $this->redirect(array('view', 'id' => $model->med_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'package' => array($package)
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $package = MedicinePkg::model()->findAll("pkg_med_id = :PK_MED_ID", array(":PK_MED_ID" => $id));

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Medicines'])) {
            $model->attributes = $_POST['Medicines'];
            if ($model->save())
                foreach ($_POST['MedicinePkg'] as $key => $data) {
                    $data['pkg_med_id'] = $id;
                    if ($data['pkg_id'] != '') {
                        $package = MedicinePkg::model()->findByPk($data['pkg_id']);
                        $package->attributes = $data;
                        $package->update();
                    } else {
                        $package = new MedicinePkg;
                        $package->attributes = $data;
                        $package->save();
                    }
                }

            $this->redirect(array('view', 'id' => $model->med_id));
        }

        $this->render('update', array(
            'model' => $model,
            'package' => $package
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
        $model = new Medicines('search');
        if (isset($_GET['Medicines']))
            $model->attributes = $_GET['Medicines'];

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
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Medicines('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Medicines']))
            $model->attributes = $_GET['Medicines'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Medicines the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Medicines::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Medicines $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'medicines-form') {
            echo CActiveForm::validate($model);
//            echo CActiveForm::validateTabular($model);
            Yii::app()->end();
        }
    }

    protected function performAjaxValidationTabular($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'medicines-form') {
            echo CActiveForm::validateTabular($model);
//            echo CActiveForm::validateTabular($model);
            Yii::app()->end();
        }
    }

}
