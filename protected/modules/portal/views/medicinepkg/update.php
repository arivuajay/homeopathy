<?php
/* @var $this MedicinepkgController */
/* @var $model MedicinePkg */

$this->breadcrumbs=array(
	'Medicine Pkgs'=>array('index'),
	$model->pkg_id=>array('view','id'=>$model->pkg_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List MedicinePkg', 'url'=>array('index')),
    array('label'=>'Create MedicinePkg', 'url'=>array('create')),
    array('label'=>'View MedicinePkg', 'url'=>array('view', 'id'=>$model->pkg_id)),
    array('label'=>'Manage MedicinePkg', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Update MedicinePkg <?php echo $model->pkg_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>            </div>
        </section>
    </div>
</div>