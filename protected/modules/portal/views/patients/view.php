<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */

$this->breadcrumbs=array(
	'Patient Profiles'=>array('index'),
	$model->pt_id,
);

$this->menu=array(
	array('label'=>'List PatientProfile', 'url'=>array('index')),
	array('label'=>'Create PatientProfile', 'url'=>array('create')),
	array('label'=>'Update PatientProfile', 'url'=>array('update', 'id'=>$model->pt_id)),
	array('label'=>'Delete PatientProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pt_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientProfile', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP121')?> <?php //echo $model->pt_id; ?></h3></header>
            <div class="panel-body">


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pt_id',
		'user_id',
		'pt_fisrtname',
		'pt_lastname',
		'pt_sex',
		'pt_email',
		'pt_dob',
		'pt_bloodgroup',
		'pt_height',
		'pt_weight',
		'pt_address',
		'pt_city',
		'pt_state',
		'pt_country',
		'pt_telephone',
		'pt_mobile',
	),
)); ?>

<?php echo CHtml::link(Myclass::t('APP64'),array('/portal/patients/'),array('class'=>'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>