<?php
/* @var $this VendorsController */
/* @var $model Vendors */

$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	$model->ven_id,
);

$this->menu=array(
	array('label'=>'List Vendors', 'url'=>array('index')),
	array('label'=>'Create Vendors', 'url'=>array('create')),
	array('label'=>'Update Vendors', 'url'=>array('update', 'id'=>$model->ven_id)),
	array('label'=>'Delete Vendors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ven_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vendors', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP241'); ?> #<?php echo $model->ven_id; ?></h3></header>
            <div class="panel-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                            'ven_id',
                            'ven_name',
                            'ven_address',
                            'ven_phone_no',
                            'ven_email',
                            array(
                                'label' =>  Myclass::t('APP55'),
                                'value' => Myclass::getStatus($model->ven_status)
                            ),
                            array(
                                'label' =>  Myclass::t('APP93'),
                                'value' => $model->createuser->ur_username
                            ),
                            'ven_created_at',
                    ),
            )); ?>
            <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/salesorder/'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>