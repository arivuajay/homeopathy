<?php
/* @var $this DoctorProfileController */
/* @var $model DoctorProfile */

$this->breadcrumbs = array(
    'Doctor Profiles' => array('index'),
    'Create',
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><?php echo Myclass::t('APP122'); ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model' => $model, 'profModel' => $profModel)); ?>
                <?php $this->renderPartial('/users/_edit_user', array('model' => $model)); ?>
            </div>
        </section>
    </div>
</div> 