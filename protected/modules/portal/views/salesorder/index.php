<?php
/* @var $this SalesorderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sales Orders',
);
?>
<section class="panel">
    <header class="panel-heading">
        Sales Orders        <?php        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/salesorder/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php 
            $this->widget('MyGridView', array(
                'id' => 'sales-order',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/salesorder/index'),
                'columns' => array(
                                            array(
                            'name' => 'so_date',
                            'type' => 'raw',
                            'value' => 'CHtml::encode(date("Y-m-d", strtotime($data->so_date)))',
                            'filter' => CHtml::activeTextField($model, 'so_date', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'so_user',
                            'type' => 'raw',
                            'value' => '$data->so_type == "1" ? CHtml::encode($data->user->patient->pt_firstname) : CHtml::encode($data->vendor->ven_name)',
                            'filter' => CHtml::activeTextField($model, 'so_user', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'so_total',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->so_total)',
                            'filter' => CHtml::activeTextField($model, 'so_total', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'so_status',
                            'type' => 'raw',
                            'value' => function($data) { 
											$lbl_cls = ($data->so_status == 1) ? 'label-success' : 'label-danger'; 
return '<span class="label '.$lbl_cls.' label-mini">' . Myclass::getStatus($data->so_status) . '</span>'; 
},
                            'filter' => CHtml::activeDropDownList($model, 'so_status', Myclass::getStatus(), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
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