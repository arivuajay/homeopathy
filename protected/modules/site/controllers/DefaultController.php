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
                'actions' => array('signupsocial','sociallogin', 'index', 'login', 'forgotpassword', 'contactus', 'user',
                    'register', 'registerdoctor', 'timezone', 'activate', 'diagnosticcentereg',
                    'doctorsearch', 'autocomplete', 'symptomslist', 'localityautocomplete', 'citylist', 'localitylist'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('cleancache', 'logout', 'myaccount', 'autocomplete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSignupsocial($provider) {
        try {
            Yii::import('application.components.HybridAuthIdentity');
            $haComp = new HybridAuthIdentity();
            if (!$haComp->validateProviderName($provider))
                throw new CHttpException('500', 'Invalid Action. Please try again.');

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            $haComp->userProfile = $haComp->adapter->getUserProfile();

            $haComp->processLogin();  //further action based on successful login or re-direct user to the required url
            $redirectUrl = $this->createUrl("/jobseeker/jobseekerprofile/myaccount");
            echo "<script type='text/javascript'>if(window.opener){window.opener.location = '$redirectUrl';window.close();}else{window.opener.location = '$redirectUrl';}</script>";
        } catch (Exception $e) {
//            echo $e->getMessage(); exit;
            //process error message as required or as mentioned in the HybridAuth 'Simple Sign-in script' documentation
            $this->redirect(array('/site/default/register'));
            return;
        }
    }

    public function actionSociallogin() {
        Yii::import('application.components.HybridAuthIdentity');
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . HybridAuthIdentity::VERSION . '/hybridauth/index.php';
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionTimezone($id) {
        $results = Zone::model()->find("country_code='$id'");

//   echo json_encode($results);
        echo $results->zone_name;
    }

    public function actionIndex() {
        $symModel = new Symptoms();
        $condModel = new Conditions();
        $specinModel = new Speciality();

        $specialities = Speciality::model()->findAll();
        $conditions = Conditions::model()->findAll();
        $procedures = Procedures::model()->findAll();
        $symptoms = Symptoms::model()->findAll();
        $tests = Test::model()->orderByName()->statusActive()->findAll();
        $diagnosticnames = DiagnosticProfile::model()->findAll();

        $this->pageTitle = "Home";
        $this->layout = "column1";
        $this->render("index", compact('specialities', 'conditions', 'procedures', 'symptoms', 'specinModel', 'symModel', 'condModel', 'tests', 'diagnosticnames'));
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
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm();

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->login()):
                switch (Yii::app()->user->user_type):
                    case 2:
                        $this->redirect(array('/diagnostic/default/myprofile'));
                        break;
                    case 3:
                        $this->redirect(array('/doctor/default/myprofile'));
                        break;
                    case 4:
                        $this->redirect(array('/patient/default/myprofile'));
                        break;
                endswitch;

            endif;
        }
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->getModule('site')->user->loginUrl);
        $this->redirect(array('index'));
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

    public function actionRegister() {
        $this->pageTitle = "Register";
        $model = new PatientProfile();
        $usermodel = new User("create");
        $usertype = new UserType();

        if (isset($_POST['PatientProfile'])) {
            $model->attributes = $_POST['PatientProfile'];
            $usermodel->attributes = $_POST['User'];
//            print_r($usermodel->attributes);exit;
            $valid = $model->validate();
            $valid = $usermodel->validate() && $valid;

            if ($valid) {
                $utype = UserType::model()->find("type_name = 'Patient'");
                $usermodel->user_type = (int) $utype->type_id;
                $befEncrypt = $usermodel->password;
                $usermodel->password = Myclass::encrypt($befEncrypt);
                $verificationcode = Myclass::getVerificationcode(6);
                $usermodel->activation_key = Myclass::encrypt($verificationcode);
                $usermodel->save(false);

                $model->user_id = $usermodel->user_id;

                $model->save(false);
                if (!empty($usermodel->useremail)):
                    $mail = new Sendmail();
                    $nextstep_url = Yii::app()->createAbsoluteUrl('/site/default/login');
                    $subject = "Registraion Mail From - " . SITENAME;
                    $trans_array = array(
                        "{SITENAME}" => SITENAME,
                        "{NEXTSTEPURL}" => $nextstep_url,
                        "{CLIENT_NAME}" => $model->fullname
                    );
                    $message = $mail->getMessage('registration', $trans_array);
                    $mail->send($usermodel->useremail, $subject, $message);
                endif;
                if (!empty($usermodel->mobile_number)):
                    $message = "Your Verification Code : " . $verificationcode;
                    Myclass::sendSms($usermodel->mobile_number, $message);
                endif;
                Yii::app()->user->SetFlash('success', 'You have successfully registered .Your verification code sent to your moblie');
                $this->redirect(array('activate'));
            }
        }

        $this->render('register', compact('model', 'usermodel', 'usertype'));
    }

    public function actionRegisterdoctor() {
        $this->pageTitle = "Registration";
        $model = new DoctorProfile();
        $usermodel = new User("create");
        $usertype = new UserType();
        if (isset($_POST['DoctorProfile'])) {

            $model->attributes = $_POST['DoctorProfile'];
//            print_r($model->attributes);exit;
            $usermodel->attributes = $_POST['User'];
            $valid = $model->validate();
            $valid = $usermodel->validate() && $valid;

            if ($valid) {
                $utype = UserType::model()->find("type_name = 'Doctors'");
                $usermodel->user_type = (int) $utype->type_id;
                $befEncrypt = $usermodel->password;
                $usermodel->password = Myclass::encrypt($befEncrypt);
                $verificationcode = Myclass::getVerificationcode(6);
                $usermodel->activation_key = Myclass::encrypt($verificationcode);
                $usermodel->save(false);

                $model->user_id = $usermodel->user_id;
                $model->save(false);
                if (!empty($usermodel->useremail)):
                    $mail = new Sendmail();
                    $nextstep_url = Yii::app()->createAbsoluteUrl('/site/default/login');
                    $subject = "Registraion Mail From - " . SITENAME;
                    $trans_array = array(
                        "{CLIENT_NAME}" => $model->doctor_name,
                        "{NEXTSTEPURL}" => $nextstep_url,
                    );
                    $message = $mail->getMessage('registration', $trans_array);
                    $mail->send($usermodel->useremail, $subject, $message);

                endif;
                if (!empty($usermodel->mobile_number)):
                    $message = "Your Verification Code : " . $verificationcode;
                    Myclass::sendSms($usermodel->mobile_number, $message);
                endif;
                Yii::app()->user->SetFlash('success', 'You have registered successfully. Your verification code sent to your moblie');
                $this->redirect(array('activate'));
            }
            else {
//                echo CHtml::errorSummary($model);exit;
            }
        }

        $this->render('registerdoctor', compact('model', 'usermodel', 'usertype'));
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

    public function actionDiagnosticcentereg() {
        $this->pageTitle = "Diagnostic Center Registration";
        $model = new DiagnosticProfile("quick_dia_reg");
        $usermodel = new User('create');
        $usertype = new UserType();
//            if ($usertype->type_id == 2):
////            $model->setScenario('quick_dia_register');
//            $usermodel->setScenario('create');
//        endif;


        if (isset($_POST['DiagnosticProfile'])) {

            $model->attributes = $_POST['DiagnosticProfile'];
            $usermodel->attributes = $_POST['User'];
            $valid = $model->validate();
            $valid = $usermodel->validate() && $valid;

            if ($valid) {
                $utype = UserType::model()->find("type_name = 'Diagnostic Center'");
                $usermodel->user_type = (int) $utype->type_id;
                $befEncrypt = $usermodel->password;
                $usermodel->password = Myclass::encrypt($befEncrypt);
                $verificationcode = Myclass::getVerificationcode(6);
                $usermodel->activation_key = Myclass::encrypt($verificationcode);
                $usermodel->save(false);

                $model->user_id = $usermodel->user_id;
                $model->save(false);
                if (!empty($usermodel->useremail)):
                    $mail = new Sendmail();
                    $nextstep_url = Yii::app()->createAbsoluteUrl('/site/default/login');
                    $subject = "Registraion Mail From - " . SITENAME;
                    $trans_array = array(
                        "{CLIENT_NAME}" => $model->full_name,
                        "{NEXTSTEPURL}" => $nextstep_url,
                    );
                    $message = $mail->getMessage('registration', $trans_array);
                    $mail->send($usermodel->useremail, $subject, $message);
                endif;
                if (!empty($usermodel->mobile_number)):
                    $message = "Your Verification Code : " . $verificationcode;
                    Myclass::sendSms($usermodel->mobile_number, $message);
                endif;
                Yii::app()->user->SetFlash('success', 'You have registered successfully. Your verification code sent to your moblie');
                $this->redirect(array('activate'));
            }
        }

        $this->render('diagnosticcentereg', compact('model', 'usermodel', 'usertype'));
    }

    public function actionDoctorsearch($id = null, $speciality = null) {
        $model = new DoctorProfile();
        $cityModel = new Cities();
        $criteria = new CDbCriteria();
        switch ($speciality):
            case 'symptoms':
                $searchname = 'symptoms';
                break;
            case 'doctor':
                $searchname = 'specialistin';
                break;
            case 'conditions':
                $searchname = 'conditions';
                break;
            case 'fac':
                $searchname = 'facilities';
                break;
        endswitch;

        $city_id = Yii::app()->request->cookies['Ent_UserCityID'];
        if (isset(Yii::app()->request->cookies['Ent_UserCity'])):
            $criteria->addSearchCondition('city', $city_id, 'true', 'AND', "LIKE");
        endif;

        if (Yii::app()->getRequest()->getParam('loc')) {
            $locality = Yii::app()->getRequest()->getParam('loc');
            $localityID = Locality::model()->find("locality_name = '$locality' AND city_id = '$city_id'")->locality_id;
            $criteria->addSearchCondition('locality', $localityID, 'true', 'AND', "LIKE");
        }
        if (isset($_GET['q'])):
            $name = $_GET['q'];
            $criteria->addSearchCondition('certifications', $name, 'true', 'AND', "LIKE");
            $criteria->addSearchCondition('description', $name, 'true', 'AND', "LIKE");
            $criteria->addSearchCondition('doctor_name', $name, 'true', 'AND', "LIKE");
        endif;
        $criteria->addSearchCondition($searchname, $id, 'true', 'AND', "LIKE");
        $doctor_lists = DoctorProfile::model()->findAll($criteria);
        $pages = count($doctor_lists);
        $this->render("doctorsearch", compact('doctor_lists', 'model', 'pages', 'cityModel', 'name'));
    }

    public function actionAutocomplete($term) {
        if (Yii::app()->request->isAjaxRequest) {

            /* q is the default GET variable name that is used by
              / the autocomplete widget to pass in user input
             */
//            $name = $_GET['q'];
            // this was set with the "max" attribute of the CAutoComplete widget
            $criteria = new CDbCriteria;
            $criteria->condition = "cityName LIKE :sterm";
            $criteria->params = array(":sterm" => "%$term%");
            $cities = Cities::model()->findAll($criteria);
            $res = CHtml::listData($cities, 'cityID', 'cityName');
//            $returnVal = '';
//            foreach ($cities as $citie) {
//                $returnVal .= $citie->getAttribute('cityName'). "\n";
//            }
//            echo $returnVal;

            echo CJSON::encode($res);
            Yii::app()->end();
        }
    }

    public function actionSymptomslist($id, $gender) {

        $lists = array();
        $lists['part_name'] = Myclass::getHumanpartsname($id);
        $criteria = new CDbCriteria();
        $criteria->addCondition("human_parts = '$id'");
        $criteria->addInCondition('symptoms_for', array($gender, '3'));

        $lists['symptoms'] = Symptoms::model()->findAll($criteria);

        echo CJSON::encode($lists);
        Yii::app()->end();
    }

    public function actionLocalityautocomplete($term) {
        if (Yii::app()->request->isAjaxRequest) {
            $city_id = Yii::app()->request->cookies['Ent_UserCityID'];
            $criteria = new CDbCriteria();
            $criteria->addCondition("city_id='{$city_id}'");
            $criteria->addSearchCondition('locality_name', $term);
            $locality_names = Locality::model()->findAll($criteria);
            $res = CHtml::listData($locality_names, 'locality_id', 'locality_name');
            echo CJSON::encode($res);
            Yii::app()->end();
        }
    }

    public function actionLocalitylist($id) {
        $localityNames = Locality::model()->findAll("city_id='{$id}'");
        $locality = CHtml::listData($localityNames, 'locality_id', 'locality_name');
        echo CJSON::encode($locality);
        Yii::app()->end();
    }

    public function actionCitylist($id) {
        $cityNames = Cities::model()->findAll("stateID = '{$id}'");
        $cities = CHtml::listData($cityNames, 'cityID', 'cityName');
        echo CJSON::encode($cities);
        Yii::app()->end();
    }

}