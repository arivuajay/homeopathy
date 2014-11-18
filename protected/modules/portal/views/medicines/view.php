<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs=array(
	'Medicines'=>array('index'),
	$model->med_id,
);

$this->menu=array(
	array('label'=>'List Medicines', 'url'=>array('index')),
	array('label'=>'Create Medicines', 'url'=>array('create')),
	array('label'=>'Update Medicines', 'url'=>array('update', 'id'=>$model->med_id)),
	array('label'=>'Delete Medicines', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->med_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Medicines', 'url'=>array('admin')),
);
?>

<h1>View Medicines #<?php echo $model->med_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tenant',
		'med_id',
		'med_cat_id',
		'med_name',
		'med_desc',
		'med_status',
	),
)); ?>
