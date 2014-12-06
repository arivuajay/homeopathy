<?php
/* @var $this PharmacistController */
/* @var $model PharmacistProfile */

$this->breadcrumbs=array(
	'Pharmacists'=>array('index'),
	'Create',
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t('APP303'); ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model'=>$model, 'profileModel' => $profileModel)); ?>
            </div>
        </section>
    </div>
</div>