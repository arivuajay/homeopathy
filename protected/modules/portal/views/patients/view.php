<?php
/* @var $this PatientsController */
/* @var $model PatientProfile */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
        'View'
);

//$this->menu=array(
//	array('label'=>'List PatientProfile', 'url'=>array('index')),
//	array('label'=>'Create PatientProfile', 'url'=>array('create')),
//	array('label'=>'Update PatientProfile', 'url'=>array('update', 'id'=>$model->pt_id)),
//	array('label'=>'Delete PatientProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pt_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage PatientProfile', 'url'=>array('admin')),
//);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3><?php echo Myclass::t('APP121')?> # <?php echo $model->pt_id; ?></h3>
            </header>
            <div class="panel-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                            'pt_id',
                            array(
                                'label' => Myclass::t('APP2'),
                                'value' => CHtml::encode($model->user->ur_username)
                            ),
                            'pt_firstname',
                            'pt_lastname',
                            array(
                                'label' => Myclass::t('APP401'),
                                'value' => CHtml::encode(Myclass::getSex($model->pt_sex))
                            ),
                            'pt_email',
                            'pt_dob',
                            'pt_bloodgroup',
                            'pt_height',
                            'pt_weight',
                            'pt_address',
                            array(
                                'label' => Myclass::t('APP116'),
                                'value' => CHtml::encode($model->ptCity->city)
                            ),
                            array(
                                'label' => Myclass::t('APP117'),
                                'value' => CHtml::encode($model->ptState->state)
                            ),
                            array(
                                'label' => Myclass::t('APP118'),
                                'value' => CHtml::encode($model->ptCountry->country)
                            ),
                            'pt_telephone',
                            'pt_mobile',
                    ),
            )); ?>
            <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/patients/'),array('class'=>'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>