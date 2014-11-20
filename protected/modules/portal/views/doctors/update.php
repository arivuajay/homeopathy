<?php
/* @var $this DoctorProfileController */
/* @var $model DoctorProfile */

$this->breadcrumbs = array(
    'Doctor Profiles' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List DoctorProfile', 'url' => array('index')),
    array('label' => 'Manage DoctorProfile', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Update Users <?php echo $model->ur_id; ?></header>
            <div class="panel-body">
                <?php $this->renderPartial('_form', array('model' => $model, 'profModel' => $profModel)); ?>
            </div>
        </section>
    </div>
</div> 