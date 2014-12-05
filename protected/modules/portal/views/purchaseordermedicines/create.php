<?php
/* @var $this PurchaseordermedicinesController */
/* @var $model PurchaseOrderMedicines */

$this->breadcrumbs=array(
    Myclass::t("APP247")=>array('index'),
    Myclass::t("APP59"),
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t("APP248"); ?> </header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>