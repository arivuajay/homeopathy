<?php
/* @var $this MedstockController */
/* @var $model MedStock */

$this->breadcrumbs=array(
	'Med Stocks'=>array('index'),
	$model->stk_id,
);

$this->menu=array(
	array('label'=>'List MedStock', 'url'=>array('index')),
	array('label'=>'Create MedStock', 'url'=>array('create')),
	array('label'=>'Update MedStock', 'url'=>array('update', 'id'=>$model->stk_id)),
	array('label'=>'Delete MedStock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->stk_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MedStock', 'url'=>array('admin')),
);
?>

<h1>View MedStock #<?php echo $model->stk_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tenant',
		'stk_id',
		'stk_med_id',
		'stk_pkg_id',
		'stk_batch_no',
		'stk_avail_units',
		'stk_debit_units',
		'check_row',
	),
)); ?>
