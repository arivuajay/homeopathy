<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'med-categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'med_cat_name'); ?>
		<?php echo $form->textField($model,'med_cat_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'med_cat_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'med_cat_parent'); ?>
		<?php echo $form->textField($model,'med_cat_parent'); ?>
		<?php echo $form->error($model,'med_cat_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'med_cat_unit'); ?>
		<?php echo $form->textField($model,'med_cat_unit',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'med_cat_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'med_cat_desc'); ?>
		<?php echo $form->textArea($model,'med_cat_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'med_cat_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'med_cat_status'); ?>
		<?php echo $form->textField($model,'med_cat_status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'med_cat_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->