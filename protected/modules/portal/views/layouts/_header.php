<?php $themeUrl = Yii::app()->theme->baseUrl; ?>
<div class="header">
    <?php
//    if (isset(Yii::app()->user->user_type)):
//        switch (Yii::app()->user->user_type):
//            case 2:
//                $modelname = DiagnosticProfile;
//                $path = DIAGNOSTIC_PROFILE_PATH;
//                $picname = profile_picture;
//                $profilename = Yii::app()->user->getState('diagnostic_name');
//                $alt = diagnostics_name;
//                break;
//            case 3:
//                $modelname = DoctorProfile;
//                $path = DOCTOR_PROFILE_PATH;
//                $picname = profile_photo;
//                $profilename = Yii::app()->user->getState('doctor_name');
//                $alt = doctor_name;
//                break;
//            case 4:
//                $modelname = PatientProfile;
//                $path = PATIENT_PROFILE_PATH;
//                $picname = profile_picture;
//                $profilename = Yii::app()->user->getState('patient_name');
//                $alt = first_name;
//                break;
//        endswitch;
//
//        $profile = $modelname::model()->find(Yii::app()->user->id);
//        echo $profilename;
//        echo CHtml::image(Yii::app()->createAbsoluteUrl($path . $profile->$picname), $profile->$alt, array("width" => 30, "height" => 30));
//    endif;
    ?>  



    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="logo">
                    <?php
                    $image = CHtml::image(Yii::app()->createAbsoluteUrl(SITE_LOGO), SITENAME);
                    echo CHtml::link($image, array('/site/default/index'), array('id' => 'brand'));
                    ?>
                </div>
            </div>
            <?php // if (Yii::app()->request->cookies['Ent_UserCity'] != ''): ?>

                <!--<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#city-select-modal"><?php // echo Yii::app()->request->cookies['Ent_UserCity']; ?></button>-->

                <?php
//            endif;
            if (isset(Yii::app()->user->id)):
                switch (Yii::app()->user->user_type):
                    case 2:
                        $this->renderPartial('application.modules.site.views.layouts._diagnostic_TopNav');
                        break;
                    case 3:
                        $this->renderPartial('application.modules.site.views.layouts._doctor_TopNav');
                        break;
                    case 4:
                        $this->renderPartial('application.modules.site.views.layouts._patient_TobNav');
                        break;
                endswitch;
            else:
                $this->renderPartial('application.modules.site.views.layouts._defaultTopNav');
            endif;
            ?>
        </div>
    </div>
</div>