<?php
/* @var $this PharmacistController */
/* @var $model PharmacistProfile */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pharmacist-profile-form',
        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
	), 
)); ?>

<?php //echo $form->errorSummary($model); ?>
        <?php  if($model->isNewRecord){ ?>
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
                <?php echo $form->passwordField($model, 'ur_password', array('value'=>'', 'size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'ur_password'); ?>
            </div>
        </div>
        <?php }else{ ?>
        <div class="form-group">
            <label class='col-lg-2 col-sm-2 control-label'><?php echo Myclass::t("APP2"); ?></label>
            <div class="col-lg-10">
                <span id="span_username"><?php echo $model->ur_username ?>&nbsp;</span>( <?php echo CHtml::link(Myclass::t('APP65'), '#edit_username', array('data-toggle' => "modal")) ?> )
            </div>
        </div>

        <div class="form-group">
            <label class='col-lg-2 col-sm-2 control-label'><?php echo Myclass::t("APP3"); ?></label>
            <div class="col-lg-10">
                *******&nbsp;( <?php echo CHtml::link(Myclass::t('APP65'), '#edit_password', array('data-toggle' => "modal")) ?> )
            </div>
        </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_first_name',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_first_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_first_name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_last_name',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_last_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_last_name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_dob',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_dob',array('class'=>'form-control default-date-picker')); ?>
                <?php echo $form->error($profileModel,'phr_dob'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_designation',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_designation',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_designation'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_about',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profileModel,'phr_about',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_about'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_address_1',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profileModel,'phr_address_1',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_address_1'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_address_2',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textArea($profileModel,'phr_address_2',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_address_2'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_city',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profileModel,'phr_city', CHtml::listData(Cities::model()->isActive()->findAll(), 'id', 'city'), array('class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_city'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_state',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profileModel,'phr_state',CHtml::listData(States::model()->isActive()->findAll(), 'id', 'state'), array('class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_state'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_country',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->dropDownList($profileModel,'phr_country',CHtml::listData(Countries::model()->isActive()->findAll(), 'id', 'country'), array('class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_country'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_phone',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_phone',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_phone'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($profileModel,'phr_mobile',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
            <div class="col-lg-10">
                <?php echo $form->textField($profileModel,'phr_mobile',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($profileModel,'phr_mobile'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <?php echo CHtml::submitButton($profileModel->isNewRecord ? Myclass::t('APP59'): Myclass::t('APP82'), array('class' => 'btn btn-info')); ?>
                <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/pharmacist/'),array('class'=>'btn btn-sm btn-default')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>
<!-- form -->