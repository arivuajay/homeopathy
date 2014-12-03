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
            <header class="panel-heading"> <h3><?php echo Myclass::t('APP236'); ?> #<?php echo $model->so_id; ?></h3></header>
            <div class="panel-body">
                <?php $this->renderPartial('_update_form', array('model'=>$model, 'sale_medicines' => $sale_medicines,'sales_medicine_list' => $sales_medicine_list)); ?>            </div>
        </section>
    </div>
</div>