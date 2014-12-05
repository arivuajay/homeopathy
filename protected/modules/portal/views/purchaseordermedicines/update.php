<?php
/* @var $this PurchaseordermedicinesController */
/* @var $model PurchaseOrderMedicines */

$this->breadcrumbs=array(
	'Purchase Order Medicines'=>array('index'),
	$model->itm_id=>array('view','id'=>$model->itm_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List PurchaseOrderMedicines', 'url'=>array('index')),
    array('label'=>'Create PurchaseOrderMedicines', 'url'=>array('create')),
    array('label'=>'View PurchaseOrderMedicines', 'url'=>array('view', 'id'=>$model->itm_id)),
    array('label'=>'Manage PurchaseOrderMedicines', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t("APP248"); ?> # <?php echo $model->itm_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>