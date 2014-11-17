<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */

$this->breadcrumbs=array(
	'Med Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MedCategories', 'url'=>array('index')),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<h1>Create MedCategories</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>