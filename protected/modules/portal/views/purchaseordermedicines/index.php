<?php
/* @var $this PurchaseordermedicinesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Myclass::t("APP247"),
);
?>
<section class="panel">
    <header class="panel-heading">
        <?php
        echo Myclass::t("APP247");
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/purchaseordermedicines/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php 
            $this->widget('MyGridView', array(
                'id' => 'purchase-order-medicines',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/purchaseordermedicines/index'),
                'columns' => array(
                                            array(
                            'name' => 'itm_med_id',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->itmMed->med_name)',
                            'filter' => CHtml::activeTextField($model, 'itm_med_id', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'itm_pkg_id',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->itmPkg->pkg_med_unit)',
                            'filter' => CHtml::activeTextField($model, 'itm_pkg_id', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'itm_batch_no',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->itm_batch_no)',
                            'filter' => CHtml::activeTextField($model, 'itm_batch_no', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'itm_qty',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->itm_qty)',
                            'filter' => CHtml::activeTextField($model, 'itm_qty', array('class' => 'form-control input-sm')),
                        ),
                                    
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'buttons' => array(
                            'view' => array(
                                'label' => '<i class="fa fa-book"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-success btn-xs', 'title' => Myclass::t("APP67")),
                            ),
                            'update' => array(
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs', 'title' => Myclass::t("APP65")),
                            ),
                            'delete' => array(
                                'label' => '<i class="fa fa-trash-o"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-danger btn-xs', 'title' => Myclass::t("APP66")),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>