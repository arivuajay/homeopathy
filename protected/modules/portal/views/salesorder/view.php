<?php
/* @var $this SalesorderController */
/* @var $model SalesOrder */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	$model->so_id,
);

$this->menu=array(
	array('label'=>'List SalesOrder', 'url'=>array('index')),
	array('label'=>'Create SalesOrder', 'url'=>array('create')),
	array('label'=>'Update SalesOrder', 'url'=>array('update', 'id'=>$model->so_id)),
	array('label'=>'Delete SalesOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->so_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalesOrder', 'url'=>array('admin')),
);
?>

<h1>View SalesOrder #<?php echo $model->so_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tenant',
		'so_id',
		'so_type',
		'so_date',
		'so_user',
		'so_doctor',
		'so_memo',
		'so_total',
		'so_paid',
		'so_status',
	),
)); ?>
