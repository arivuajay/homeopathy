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
<div class="row">
    <div class="col-lg-12">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>