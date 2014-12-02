<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */

$this->breadcrumbs=array(
	'Patient Profiles'=>array('index'),
	$model->pt_id=>array('view','id'=>$model->pt_id),
	'Update',
);

$this->menu=array(
    array('label'=>'List PatientProfile', 'url'=>array('index')),
    array('label'=>'Create PatientProfile', 'url'=>array('create')),
    array('label'=>'View PatientProfile', 'url'=>array('view', 'id'=>$model->pt_id)),
    array('label'=>'Manage PatientProfile', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Update PatientProfile <?php echo $model->pt_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_edit_form', array('model'=>$model,'user_model' => $user_model)); ?>            </div>
        </section>
    </div>
</div>