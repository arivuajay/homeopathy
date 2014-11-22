<?php
/* @var $this MedicinepkgController */
/* @var $model MedicinePkg */

$this->breadcrumbs=array(
	'Medicine Pkgs'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Create MedicinePkg</header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>