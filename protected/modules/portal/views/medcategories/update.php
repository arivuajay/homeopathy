<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */

$this->breadcrumbs=array(
	'Med Categories'=>array('index'),
	$model->med_cat_id=>array('view','id'=>$model->med_cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MedCategories', 'url'=>array('index')),
	array('label'=>'Create MedCategories', 'url'=>array('create')),
	array('label'=>'View MedCategories', 'url'=>array('view', 'id'=>$model->med_cat_id)),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP62')?></h3></header>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </section>
    </div>
</div>