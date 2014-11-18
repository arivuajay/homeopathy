<?php
/* @var $this DoctorsController */
/* @var $model Users */
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
		<?php echo $form->label($model,'ur_id'); ?>
		<?php echo $form->textField($model,'ur_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_role_id'); ?>
		<?php echo $form->textField($model,'ur_role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_username'); ?>
		<?php echo $form->textField($model,'ur_username',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_activation_key'); ?>
		<?php echo $form->textField($model,'ur_activation_key',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_created_at'); ?>
		<?php echo $form->textField($model,'ur_created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_modified_at'); ?>
		<?php echo $form->textField($model,'ur_modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_last_login'); ?>
		<?php echo $form->textField($model,'ur_last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_last_ip'); ?>
		<?php echo $form->textField($model,'ur_last_ip',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ur_status'); ?>
		<?php echo $form->textField($model,'ur_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->