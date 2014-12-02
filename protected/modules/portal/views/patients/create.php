<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */

$this->breadcrumbs=array(
	'Patient Profiles'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Create PatientProfile</header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'user_model' => $user_model)); ?>            </div>
        </section>
    </div>
</div>