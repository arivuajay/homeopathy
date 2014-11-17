<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */

$this->breadcrumbs=array(
	'Med Categories'=>array('index'),
	$model->med_cat_id,
);

$this->menu=array(
	array('label'=>'List MedCategories', 'url'=>array('index')),
	array('label'=>'Create MedCategories', 'url'=>array('create')),
	array('label'=>'Update MedCategories', 'url'=>array('update', 'id'=>$model->med_cat_id)),
	array('label'=>'Delete MedCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->med_cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<h1>View MedCategories #<?php echo $model->med_cat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'med_cat_id',
		'med_cat_name',
		'med_cat_parent',
		'med_cat_unit',
		'med_cat_desc',
		'med_cat_status',
	),
)); ?>
