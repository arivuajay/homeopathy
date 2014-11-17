<?php
/* @var $this MedcategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Med Categories',
);

$this->menu=array(
	array('label'=>'Create MedCategories', 'url'=>array('create')),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<h1>Med Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
