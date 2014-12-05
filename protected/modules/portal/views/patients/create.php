<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Create',
);

$this->flashMessages = Yii::app()->user->getFlashes();
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t('APP407'); ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'user_model' => $user_model)); ?>            
            </div>
        </section>
    </div>
</div>