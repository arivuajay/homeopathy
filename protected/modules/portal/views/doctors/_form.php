        <?php
        /* @var $this DoctorProfileController */
        /* @var $profModel DoctorProfile */
        /* @var $form CActiveForm */
        ?>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'doctors-form',
            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
            'enableAjaxValidation' => true,
                ));
        ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'ur_username', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($model, 'ur_username', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'ur_username'); ?>
            </div>
        </div>                                

        <div class="form-group">
            <?php echo $form->labelEx($model, 'ur_password', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->passwordField($model, 'ur_password', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'value'=>'')); ?>
                <?php echo $form->error($model, 'ur_password'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_firstname', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_firstname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_firstname'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_lastname', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_lastname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_lastname'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_dob', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_dob', array('class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_dob'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_speciality', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_speciality', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_speciality'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_certificate', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profModel, 'doc_certificate', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_certificate'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_designated', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_designated', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_designated'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_awards', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profModel, 'doc_awards', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_awards'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_about', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profModel, 'doc_about', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_about'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_address_1', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profModel, 'doc_address_1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_address_1'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_address_2', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profModel, 'doc_address_2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_address_2'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_city', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profModel, 'doc_city', CHtml::listData(Cities::model()->isActive()->findAll(), 'id', 'city'), array('class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_city'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_state', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profModel, 'doc_state', CHtml::listData(States::model()->isActive()->findAll(), 'id', 'state'), array('class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_state'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_country', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profModel, 'doc_country', CHtml::listData(Countries::model()->isActive()->findAll(), 'id', 'country'), array('class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_country'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_phone', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_phone', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_phone'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profModel, 'doc_mobile_no', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profModel, 'doc_mobile_no', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($profModel, 'doc_mobile_no'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <?php echo CHtml::submitButton($profModel->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
                <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/doctors/'),array('class'=>'btn btn-sm btn-default')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>
        <!-- form -->