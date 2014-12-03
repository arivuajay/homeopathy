<?php
/* @var $this PharmacistController */
/* @var $model PharmacistProfile */

$this->breadcrumbs=array(
	'Pharmacists'=>array('index'),
	'View',
);

$this->menu=array(
	array('label'=>'List PharmacistProfile', 'url'=>array('index')),
	array('label'=>'Create PharmacistProfile', 'url'=>array('create')),
	array('label'=>'Update PharmacistProfile', 'url'=>array('update', 'id'=>$model->phr_id)),
	array('label'=>'Delete PharmacistProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->phr_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PharmacistProfile', 'url'=>array('admin')),
);
?>


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3><?php echo Myclass::t('APP302')?> #<?php echo $model->phr_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                            'phr_id',
                            array(
                                'label' => Myclass::t('APP2'),
                                'value' => CHtml::encode($model->user->ur_username)
                            ),
                            'phr_first_name',
                            'phr_last_name',
                            'phr_dob',
                            'phr_designation',
                            'phr_about',
                            'phr_address_1',
                            'phr_address_2',
                            array(
                                'label' => Myclass::t('APP116'),
                                'value' => CHtml::encode($model->phrCity->city)
                            ),
                            array(
                                'label' => Myclass::t('APP117'),
                                'value' => CHtml::encode($model->phrState->state)
                            ),
                            array(
                                'label' => Myclass::t('APP118'),
                                'value' => CHtml::encode($model->phrCountry->country)
                            ),
                            'phr_phone',
                            'phr_mobile',
                    ),
                )); ?>
                <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/pharmacist/'),array('class'=>'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>
