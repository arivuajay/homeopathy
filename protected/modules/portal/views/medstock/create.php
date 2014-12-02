<?php
/* @var $this MedstockController */
/* @var $model MedStock */

$this->breadcrumbs=array(
	'Med Stocks'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Create MedStock</header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>