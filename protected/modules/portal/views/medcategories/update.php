<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */

$this->breadcrumbs=array(
	Myclass::t('APP57')=>array('index'),
	Myclass::t('APP15')=>array('index'),
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