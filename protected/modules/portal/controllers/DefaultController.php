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
        
        $doctors_count = Users::model()->isDoctor()->count();
        $pharmacists_count = Users::model()->isPharmacist()->count();
        $patients_count = Users::model()->isPatient()->count();
        
        $t_sales = Yii::app()->db->createCommand()
            ->select('SUM(so_total) AS total_sales')
            ->from('hme_sales_order')  
            ->where('so_status= "1" And tenant = "'.Yii::app()->user->getState('tenant').'"') 
            ->queryRow();
        
        
        $stk_meds = Yii::app()->db->createCommand()
            ->select('b.med_id, b.med_name')
            ->from('hme_med_stock a')  
            ->join('hme_medicines b','b.med_id = a.stk_med_id')  
            ->group('a.stk_med_id')  
            ->where('a.tenant = "'.Yii::app()->user->getState('tenant').'"') 
            ->queryAll();

        $stocks = Yii::app()->db->createCommand()
            ->select('a.stk_med_id, a.stk_pkg_id, b.med_name, c.pkg_med_unit, SUM(a.stk_avail_units) as stk_avail_units')
            ->from('hme_med_stock a')  
            ->join('hme_medicines b','b.med_id = a.stk_med_id')  
            ->join('hme_medicine_pkg c','c.pkg_id = a.stk_pkg_id')  
            ->group('a.stk_med_id, a.stk_pkg_id')  
            ->where('a.tenant = "'.Yii::app()->user->getState('tenant').'"') 
            ->queryAll();
        
        $this->render('index', array(
                                'model' => $model,
                                'doctors_count' => $doctors_count,
                                'pharmacists_count' => $pharmacists_count,
                                'patients_count' => $patients_count,
                                'total_sales' => $t_sales['total_sales'] == '' ? 0 : $t_sales['total_sales'],
                                'stocks' => $stocks,
                                'stk_meds' => $stk_meds
                                ));        
    }

    public function actionLogin() {
        $this->layout = 'login';
        $model = new LoginForm('login');
        $forget = new LoginForm('forgotpassword');
        
        // collect user input data
        if (isset($_POST['sign_in'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->login()):
                $this->redirect(array('/portal/default/index'));
            endif;
        }
        $this->render('login', compact('model' ,'forget'));
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
        $forget = new Users('forgotpassword');
        $this->performAjaxValidation($forget);  
        
        if (isset($_POST['forget_password'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->checkexists()):
                $this->redirect(array('/portal/default/index'));
            endif;
        }        
        if (isset($_POST['User'])):
            $forget->attributes = $_POST['User'];
            $valid = $forget->validate();

            if ($valid):
                $user = User::model()->find('mobile_number ="' . $forget->mobile_number . '"');
                $bef_encrypt = Myclass::getRandomString('8');
                $user->password = Myclass::encrypt($bef_encrypt);

                $user->save(false);
                if (!empty($user->mobile_number)):
                    $message = "Your Verification Code : " . $bef_encrypt;
                    Myclass::sendSms($user->mobile_number, $message);
                endif;

                Yii::app()->user->setFlash('success', 'Your request for reset-password has been sent to ' . $forget->mobile_number . '. Please check your inbox');
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'forgotForm') {
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
