<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs = array(
    'Medicines' => array('index'),
    $model->med_id,
);

$this->menu = array(
    array('label' => 'List Medicines', 'url' => array('index')),
    array('label' => 'Create Medicines', 'url' => array('create')),
    array('label' => 'Update Medicines', 'url' => array('update', 'id' => $model->med_id)),
    array('label' => 'Delete Medicines', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->med_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Medicines', 'url' => array('admin')),
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
                        array(
                            'label' => Myclass::t('APP51'),
                            'value' => CHtml::encode($model->medCat->med_cat_name)
                        ),
                        'med_name',
                        'med_desc',
                        array(
                            'label' => Myclass::t('APP55'),
                            'value' => Myclass::getStatus($model->med_status)
                        ),
                    ),
                ));
                ?>

                <div class="col-lg-6 col-sm-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo Myclass::t('APP79'); ?></th>
                                <th><?php echo Myclass::t('APP84'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->medicinePkgs as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value->pkg_med_unit ?></td>
                                    <td><?php echo $value->pkg_med_power ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-12">
                    <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/medicines/'), array('class' => 'btn btn-sm btn-default')); ?>   
                </div>

                 
            </div>    
        </section>
    </div>
</div>
