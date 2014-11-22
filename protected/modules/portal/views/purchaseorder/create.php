<?php
/* @var $this PurchaseorderController */
/* @var $model PurchaseOrder */

$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <h3><?php echo Myclass::t('APP94'); ?></h3></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'purchase_medicines' => $purchase_medicines)); ?>            </div>
        </section>
    </div>
</div>