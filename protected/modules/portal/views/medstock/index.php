<?php
/* @var $this MedstockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Med Stocks',
);
?>
<section class="panel">
    <header class="panel-heading">
        Med Stocks        <?php        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/medstock/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php 
            $this->widget('MyGridView', array(
                'id' => 'med-stock',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/medstock/index'),
                'columns' => array(
                                            array(
                            'name' => 'tenant',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->tenant)',
                            'filter' => CHtml::activeTextField($model, 'tenant', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'stk_med_id',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->stk_med_id)',
                            'filter' => CHtml::activeTextField($model, 'stk_med_id', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'stk_pkg_id',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->stk_pkg_id)',
                            'filter' => CHtml::activeTextField($model, 'stk_pkg_id', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'stk_batch_no',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->stk_batch_no)',
                            'filter' => CHtml::activeTextField($model, 'stk_batch_no', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'stk_avail_units',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->stk_avail_units)',
                            'filter' => CHtml::activeTextField($model, 'stk_avail_units', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'stk_debit_units',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->stk_debit_units)',
                            'filter' => CHtml::activeTextField($model, 'stk_debit_units', array('class' => 'form-control input-sm')),
                        ),
                                    
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'buttons' => array(
                            'view' => array(
                                'label' => '<i class="fa fa-book"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-success btn-xs'),
                            ),
                            'update' => array(
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs'),
                            ),
                            'delete' => array(
                                'label' => '<i class="fa fa-trash-o"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-danger btn-xs'),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>