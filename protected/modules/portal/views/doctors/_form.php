<?php
/* @var $this DoctorsController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<?php ?>
<div class="row">

                  <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <h3> <?php echo Myclass::t('APP104'); ?></h3>
                             
                          </header>
                          <div class="panel-body form-horizontal">
                             
                              <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array(
                          'class'=>'form-horizontal  tasi-form',
                        )
	
)); ?>
  <?php echo $form->errorSummary(array($model,$user_meta)); ?>
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_name'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_name',array ('class' => 'form-control')); ?>
                                         <?php echo $form->error($user_meta,'ur_role_name'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($model,'ur_username'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($model,'ur_username',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                                         <?php echo $form->error($model,'ur_username'); ?>
                                      </div>
                                  </div>
                                  
                                
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($model,'ur_password'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->passwordField($model,'ur_password',array('size'=>60,'maxlength'=>255 ,'class' => 'form-control','type' => 'form-control')); ?>
										 <?php echo $form->error($model,'ur_password'); ?>
                                      </div>
                                  </div>
                                  
                                    <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_dob'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_dob',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                                         <?php echo $form->error($user_meta,'ur_role_dob'); ?>
                                      </div>
                                  </div>
                                  
                                   <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_specialty'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_specialty',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_specialty'); ?>
                                      </div>
                                  </div>
                                  
                                     <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_certif'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_certif',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_certif'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_desig'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_desig',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_desig'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_awards'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_awards',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_awards'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_about'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_about',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_about'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_address_one'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textArea($user_meta,'ur_role_address_one',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_address_one'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_address_two'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textArea($user_meta,'ur_role_address_two',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_address_two'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_city'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_city',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_city'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_state'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_state',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_state'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_country'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_country',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_country'); ?>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_phone'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_phone',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_phone'); ?>
                                      </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3"><?php echo $form->labelEx($user_meta,'ur_role_mobile'); ?></label>
                                      <div class="col-md-4">
                                         <?php echo $form->textField($user_meta,'ur_role_mobile',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
		                                 <?php echo $form->error($user_meta,'ur_role_mobile'); ?>
                                      </div>
                                  </div>
                                  
                                  
                                 

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>


<?php $this->endWidget(); ?>

                            
                          </div>
                      </section>
                  </div>
              </div>




<?php /*?><div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant'); ?>
		<?php echo $form->textField($model,'tenant'); ?>
		<?php echo $form->error($model,'tenant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_role_id'); ?>
		<?php echo $form->textField($model,'ur_role_id'); ?>
		<?php echo $form->error($model,'ur_role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_username'); ?>
		<?php echo $form->textField($model,'ur_username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ur_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_password'); ?>
		<?php echo $form->textField($model,'ur_password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ur_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_activation_key'); ?>
		<?php echo $form->textField($model,'ur_activation_key',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ur_activation_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_created_at'); ?>
		<?php echo $form->textField($model,'ur_created_at'); ?>
		<?php echo $form->error($model,'ur_created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_modified_at'); ?>
		<?php echo $form->textField($model,'ur_modified_at'); ?>
		<?php echo $form->error($model,'ur_modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_last_login'); ?>
		<?php echo $form->textField($model,'ur_last_login'); ?>
		<?php echo $form->error($model,'ur_last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_last_ip'); ?>
		<?php echo $form->textField($model,'ur_last_ip',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ur_last_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ur_status'); ?>
		<?php echo $form->textField($model,'ur_status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ur_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><?php */?><!-- form -->