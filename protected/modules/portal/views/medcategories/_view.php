<?php
/* @var $this MedcategoriesController */
/* @var $data MedCategories */
?>

<tr class="gradeX">
    <td><?php echo CHtml::encode($data->med_cat_name); ?></td>
    <td><?php $categories = Myclass::getParentCategory(CHtml::encode($data->med_cat_parent));?><?php //echo CHtml::encode($data->med_cat_parent); ?></td>
    <td><?php echo Myclass::getMedicineUnit(CHtml::encode($data->med_cat_unit)); ?></td>
    <td class="center hidden-phone"><?php echo CHtml::encode($data->med_cat_desc); ?></td>
    <td class="center hidden-phone">X</td>
</tr>
                
               
<!--<div class="view">

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


</div>-->