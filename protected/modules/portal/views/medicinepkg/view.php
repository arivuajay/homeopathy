<?php
/* @var $this MedicinepkgController */
/* @var $model MedicinePkg */

$this->breadcrumbs = array(
    'Medicine Pkgs' => array('index'),
    $model->pkg_id,
);

$this->menu = array(
    array('label' => 'List MedicinePkg', 'url' => array('index')),
    array('label' => 'Create MedicinePkg', 'url' => array('create')),
    array('label' => 'Update MedicinePkg', 'url' => array('update', 'id' => $model->pkg_id)),
    array('label' => 'Delete MedicinePkg', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->pkg_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage MedicinePkg', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP83') ?> #<?php echo $model->med_id; ?></h3></header>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'pkg_id',
                        'pkg_med_id',
                        'pkg_med_unit',
                        'pkg_med_power',
                    ),
                ));
                ?>

                <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/medicinespkg/'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>
