<?php
/* @var $this MedcategoriesController */
/* @var $data MedCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->med_cat_id), array('view', 'id'=>$data->med_cat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_name')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_parent')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_unit')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_desc')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med_cat_status')); ?>:</b>
	<?php echo CHtml::encode($data->med_cat_status); ?>
	<br />


</div>