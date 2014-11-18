<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */

$this->breadcrumbs=array(
	'Med Categories'=>array('index'),
	$model->med_cat_id,
);

$this->menu=array(
	array('label'=>'List MedCategories', 'url'=>array('index')),
	array('label'=>'Create MedCategories', 'url'=>array('create')),
	array('label'=>'Update MedCategories', 'url'=>array('update', 'id'=>$model->med_cat_id)),
	array('label'=>'Delete MedCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->med_cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP63')?> #<?php echo $model->med_cat_id; ?></h3></header>
            <div class="panel-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                            'med_cat_id',
                            'med_cat_name',
                            array(              
                                'label'=>Myclass::t('APP52'),
                                'value'=>CHtml::encode($model->medparcat->med_cat_name),
                            ),
                            array(              
                                'label'=>Myclass::t('APP53'),
                                'value'=>Myclass::getMedicineUnit($model->med_cat_unit),
                            ),
                            'med_cat_desc',
                            array(              
                                'label'=>Myclass::t('APP55'),
                                'value'=>Myclass::getMedicineStatus($model->med_cat_status),
                            ),
                    ),
            )); ?>
            <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/medcategories/'),array('class'=>'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>



