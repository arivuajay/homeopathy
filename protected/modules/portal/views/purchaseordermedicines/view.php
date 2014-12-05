<?php
/* @var $this PurchaseordermedicinesController */
/* @var $model PurchaseOrderMedicines */

$this->breadcrumbs=array(
    Myclass::t("APP247")=>array('index'),
    $model->itm_id,
);

$this->menu=array(
	array('label'=>'List PurchaseOrderMedicines', 'url'=>array('index')),
	array('label'=>'Create PurchaseOrderMedicines', 'url'=>array('create')),
	array('label'=>'Update PurchaseOrderMedicines', 'url'=>array('update', 'id'=>$model->itm_id)),
	array('label'=>'Delete PurchaseOrderMedicines', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->itm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PurchaseOrderMedicines', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t("APP250"); ?> #<?php echo $model->itm_id; ?></h3></header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                                'itm_id',
                                'itm_po_id',
                                'itm_med_id',
                                'itm_pkg_id',
                                'itm_batch_no',
                                'itm_manf_date',
                                'itm_exp_date',
                                'itm_vat_tax',
                                'itm_mrp_price',
                                'itm_discount',
                                'itm_net_rate',
                                'itm_qty',
                                'itm_total_price',
                        ),
                )); ?>
                <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/purchaseordermedicines/index'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>