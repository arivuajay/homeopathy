<?php
/* @var $this MedicinesController */
/* @var $model Medicines */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tenant'); ?>
		<?php echo $form->textField($model,'tenant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_id'); ?>
		<?php echo $form->textField($model,'med_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_id'); ?>
		<?php echo $form->textField($model,'med_cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_name'); ?>
		<?php echo $form->textField($model,'med_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_desc'); ?>
		<?php echo $form->textArea($model,'med_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_status'); ?>
		<?php echo $form->textField($model,'med_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->