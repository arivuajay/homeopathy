<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-profile-form',
        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'ur_username',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                     <?php echo $form->textField($user_model, 'ur_username', array('class' => 'form-control')); ?>
                 <?php echo $form->error($user_model, 'ur_username'); ?>
        </div>
    </div>
        <div class="form-group">
      <?php echo $form->labelEx($user_model, 'ur_password',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
        <?php echo $form->passwordField($user_model, 'ur_password', array('class' => 'form-control')); ?>
                <?php echo $form->error($user_model, 'ur_password'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_fisrtname',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_fisrtname',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_fisrtname'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_lastname',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_lastname',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_lastname'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_sex',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php //echo $form->textField($model,'pt_sex',array('size'=>1,'maxlength'=>1,'class'=>'form-control')); ?>
                    <?php $sex = Myclass::getSex();?>
                <?php echo $form->dropDownList($model, 'pt_sex', $sex, array('class'=>"form-control"));?>
                <?php echo $form->error($model,'pt_sex'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_email',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_email'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_dob',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_dob',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_dob'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_bloodgroup',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_bloodgroup',array('size'=>1,'maxlength'=>1,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_bloodgroup'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_height',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_height',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_height'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_weight',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_weight',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_weight'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_address',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textArea($model,'pt_address',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_address'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_city',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->dropDownList($model, 'pt_city', CHtml::listData(Cities::model()->isActive()->findAll(), 'id', 'city'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'pt_city'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_state',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                   <?php echo $form->dropDownList($model, 'pt_state', CHtml::listData(States::model()->isActive()->findAll(), 'id', 'state'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'pt_state'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_country',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->dropDownList($model, 'pt_country', CHtml::listData(Countries::model()->isActive()->findAll(), 'id', 'country'), array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'pt_country'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_telephone',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_telephone',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_telephone'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pt_mobile',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pt_mobile',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pt_mobile'); ?>
        </div>
    </div>
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->