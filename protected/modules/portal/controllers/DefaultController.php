<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('login', 'forgotpassword', 'contactus', 'activate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'cleancache', 'logout', 'myaccount', 'autocomplete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index', array('model' => $model));        
    }

    public function actionLogin() {
        $this->layout = 'login';
        $model = new LoginForm();

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->login()):
                $this->redirect(array('/portal/default/index'));
            endif;
        }
        $this->render('login', array('model' => $model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->getModule('portal')->user->loginUrl);
        $this->redirect(array('/portal/default/login'));
//        $this->redirect(array('index'));
    }

    public function actionForgotpassword() {

        $model = new User('forgotpassword');
        if (isset($_POST['User'])):
            $model->attributes = $_POST['User'];
            $valid = $model->validate();

            if ($valid):
                $user = User::model()->find('mobile_number ="' . $model->mobile_number . '"');
                $bef_encrypt = Myclass::getRandomString('8');
                $user->password = Myclass::encrypt($bef_encrypt);

                $user->save(false);
                if (!empty($user->mobile_number)):
                    $message = "Your Verification Code : " . $bef_encrypt;
                    Myclass::sendSms($user->mobile_number, $message);
                endif;

                Yii::app()->user->setFlash('success', 'Your request for reset-password has been sent to ' . $model->mobile_number . '. Please check your inbox');
                $this->redirect(array('activate'));
            endif;
        endif;

        $this->render('forgotpassword', compact('model', 'value'));
    }

    public function actionContactus() {
        $this->pageTitle = 'Contact Us';
        $model = new Contactus();
        $this->performAjaxValidation($model);

        if (isset($_POST['Contactus'])) {

            $model->attributes = $_POST['Contactus'];

            if ($model->validate()) {
                $admindetails = Admin::model()->findByPk(1);
                $mail = new Sendmail;
                $trans_array = array(
                    "{ADMINNAME}" => $admindetails->admin_name,
                    "{NAME}" => ucfirst($model->name),
                    "{CONTACTMAIL}" => $model->email,
                    "{CONTACTPHONE}" => $model->phoneno,
                    "{CONTACTSUB}" => $model->subject,
                    "{MESSAGE}" => $model->message,
                );
                $message = $mail->getMessage('contactus', $trans_array);
                $Subject = $mail->translate('A User Contact mail to {SITENAME}');
                $mail->send($admindetails->admin_email, $Subject, $message);
                Yii::app()->user->setFlash('success', 'Your detail has been sent to admin, he will contact you soon.');
                $this->redirect(array('contactus'));
            }
        }
        $this->render('contactus', compact('model'));
    }

    public function actionCleancache() {
        $it = new RecursiveDirectoryIterator('assets');
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }

        echo 'Cache Cleared';
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cms-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionActivate() {
        $model = new User();
        $model->setScenario('activate');

        if (isset($_POST['User'])):
            $model->attributes = $_POST['User'];
            $aft_enc_code = Myclass::encrypt($model->activation_key);
            if ($model->validate()):
                $userdetail = User::model()->find("activation_key='$aft_enc_code'");
                if (!is_null($userdetail)):
                    $userdetail->user_status = 1;
                    $userdetail->save(FALSE);

                    $this->redirect(array('login'));

                endif;
            endif;
        endif;
        $this->render('activate', compact('model'));
    }

}
