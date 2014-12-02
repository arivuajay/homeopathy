<?php
/* @var $this MedstockController */
/* @var $model MedStock */

$this->breadcrumbs=array(
	'Med Stocks'=>array('index'),
	$model->stk_id=>array('view','id'=>$model->stk_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List MedStock', 'url'=>array('index')),
    array('label'=>'Create MedStock', 'url'=>array('create')),
    array('label'=>'View MedStock', 'url'=>array('view', 'id'=>$model->stk_id)),
    array('label'=>'Manage MedStock', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Update MedStock <?php echo $model->stk_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>