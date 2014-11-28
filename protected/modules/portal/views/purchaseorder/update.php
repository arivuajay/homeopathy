<?php
/* @var $this PurchaseorderController */
/* @var $model PurchaseOrder */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->po_id=>array('view','id'=>$model->po_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List PurchaseOrder', 'url'=>array('index')),
    array('label'=>'Create PurchaseOrder', 'url'=>array('create')),
    array('label'=>'View PurchaseOrder', 'url'=>array('view', 'id'=>$model->po_id)),
    array('label'=>'Manage PurchaseOrder', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <h3><?php echo Myclass::t('APP94'); ?> #<?php echo $model->po_id; ?></h3></header>
            <div class="panel-body">
                <?php $this->renderPartial('_update_form', array('model'=>$model, 'purchase_medicines' => $purchase_medicines, 'purchase_medicine_list' => $purchase_medicine_list)); ?>            </div>
        </section>
    </div>
</div>