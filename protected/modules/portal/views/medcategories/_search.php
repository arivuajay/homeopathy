<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'med_cat_id'); ?>
		<?php echo $form->textField($model,'med_cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_name'); ?>
		<?php echo $form->textField($model,'med_cat_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_parent'); ?>
		<?php echo $form->textField($model,'med_cat_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_unit'); ?>
		<?php echo $form->textField($model,'med_cat_unit',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_desc'); ?>
		<?php echo $form->textArea($model,'med_cat_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'med_cat_status'); ?>
		<?php echo $form->textField($model,'med_cat_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->