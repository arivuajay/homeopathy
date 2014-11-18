<?php
/* @var $this MedicinesController */
/* @var $data Medicines */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->med_id), array('view', 'id'=>$data->med_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenant')); ?>:</b>
	<?php echo CHtml::encode($data->tenant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_name')); ?>:</b>
	<?php echo CHtml::encode($data->med_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_desc')); ?>:</b>
	<?php echo CHtml::encode($data->med_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_status')); ?>:</b>
	<?php echo CHtml::encode($data->med_status); ?>
	<br />


</div>