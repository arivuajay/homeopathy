<?php
/* @var $this DoctorsController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Doctors'=>array('index'),
	'View',
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3><?php echo Myclass::t('APP105')?> # <?php echo $model->doctor->docinfo_id; ?></h3>
            </header>
            <div class="panel-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                                'ur_username',
                                array(              
                                   'label'=>Myclass::t('APP106'),
                                   'value'=>CHtml::encode($model->doctor->doc_firstname),
                                ),
                                array(              
                                   'label'=>Myclass::t('APP107'),
                                   'value'=>CHtml::encode($model->doctor->doc_lastname),
                                ),
                                array(              
                                   'label'=>Myclass::t('APP108'),
                                   'value'=>CHtml::encode($model->doctor->doc_dob),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP109'),
                                     'value'=>CHtml::encode($model->doctor->doc_speciality),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP110'),
                                     'value'=>CHtml::encode($model->doctor->doc_certificate),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP111'),
                                     'value'=>CHtml::encode($model->doctor->doc_designated),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP112'),
                                     'value'=>CHtml::encode($model->doctor->doc_awards),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP113'),
                                     'value'=>CHtml::encode($model->doctor->	doc_about),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP114'),
                                     'value'=>CHtml::encode($model->doctor->doc_address_1),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP115'),
                                     'value'=>CHtml::encode($model->doctor->doc_address_2),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP116'),
                                     'value'=>CHtml::encode( $model->doctor->docCity->city),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP117'),
                                     'value'=>CHtml::encode($model->doctor->docState->state),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP118'),
                                     'value'=>CHtml::encode($model->doctor->docCountry->country),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP119'),
                                     'value'=>CHtml::encode($model->doctor->doc_phone),
                                ),
                                array(              
                                     'label'=>Myclass::t('APP120'),
                                     'value'=>CHtml::encode($model->doctor->doc_mobile_no),
                                ),
                        ),
                    )); 
                ?>
            <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/doctors/'),array('class'=>'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>