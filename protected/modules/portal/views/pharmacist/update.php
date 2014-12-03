<?php
/* @var $this PharmacistController */
/* @var $model PharmacistProfile */

$this->breadcrumbs=array(
	'Pharmacists'=>array('index'),
	'Update',
);

//$this->menu=array(
//    array('label'=>'List PharmacistProfile', 'url'=>array('index')),
//    array('label'=>'Create PharmacistProfile', 'url'=>array('create')),
//    array('label'=>'View PharmacistProfile', 'url'=>array('view', 'id'=>$model->phr_id)),
//    array('label'=>'Manage PharmacistProfile', 'url'=>array('admin')),
//);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t('APP304'); ?> </header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'profileModel' => $profileModel)); ?>                  
            </div>
        </section>
    </div>
</div>