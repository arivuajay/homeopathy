<?php
/* @var $this SalesorderController */
/* @var $model SalesOrder */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	$model->so_id=>array('view','id'=>$model->so_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List SalesOrder', 'url'=>array('index')),
    array('label'=>'Create SalesOrder', 'url'=>array('create')),
    array('label'=>'View SalesOrder', 'url'=>array('view', 'id'=>$model->so_id)),
    array('label'=>'Manage SalesOrder', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Update SalesOrder <?php echo $model->so_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>