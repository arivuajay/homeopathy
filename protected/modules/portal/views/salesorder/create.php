<?php
/* @var $this SalesorderController */
/* @var $model SalesOrder */

$this->breadcrumbs=array(
	'Sales Orders'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP236'); ?></h3></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'sale_medicines' => $sale_medicines)); ?>            </div>
        </section>
    </div>
</div>