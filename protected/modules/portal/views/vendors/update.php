<?php
/* @var $this VendorsController */
/* @var $model Vendors */

$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	$model->ven_id=>array('view','id'=>$model->ven_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List Vendors', 'url'=>array('index')),
    array('label'=>'Create Vendors', 'url'=>array('create')),
    array('label'=>'View Vendors', 'url'=>array('view', 'id'=>$model->ven_id)),
    array('label'=>'Manage Vendors', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Update Vendors <?php echo $model->ven_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>