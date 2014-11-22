<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs=array(
	'Medicines'=>array('index'),
	$model->med_id=>array('view','id'=>$model->med_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medicines', 'url'=>array('index')),
	array('label'=>'Create Medicines', 'url'=>array('create')),
	array('label'=>'View Medicines', 'url'=>array('view', 'id'=>$model->med_id)),
	array('label'=>'Manage Medicines', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP85')?> # <?php echo $model->med_id; ?></h3></header>
            <?php $this->renderPartial('_form', array('model'=>$model, 'package' => $package)); ?>
        </section>
    </div>
</div>
