<?php
/* @var $this PharmacistController */
/* @var $model PharmacistProfile */

$this->breadcrumbs=array(
	'Pharmacist Profiles'=>array('index'),
	$model->phr_id,
);

$this->menu=array(
	array('label'=>'List PharmacistProfile', 'url'=>array('index')),
	array('label'=>'Create PharmacistProfile', 'url'=>array('create')),
	array('label'=>'Update PharmacistProfile', 'url'=>array('update', 'id'=>$model->phr_id)),
	array('label'=>'Delete PharmacistProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->phr_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PharmacistProfile', 'url'=>array('admin')),
);
?>

<h1>View PharmacistProfile #<?php echo $model->phr_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'phr_id',
		'user_id',
		'phr_first_name',
		'phr_last_name',
		'phr_dob',
		'phr_designation',
		'phr_about',
		'phr_address_1',
		'phr_address_2',
		'phr_city',
		'phr_state',
		'phr_country',
		'phr_phone',
		'phr_mobile',
	),
)); ?>
