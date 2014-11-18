<?php
/* @var $this DoctorsController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ur_id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->ur_id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ur_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->ur_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tenant',
		'ur_id',
		'ur_role_id',
		'ur_username',
		'ur_password',
		'ur_activation_key',
		'ur_created_at',
		'ur_modified_at',
		'ur_last_login',
		'ur_last_ip',
		'ur_status',
	),
)); ?>
