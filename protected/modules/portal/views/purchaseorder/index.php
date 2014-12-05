<?php
/* @var $this PurchaseorderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Orders',
);
?>
<section class="panel">
    <header class="panel-heading">
        <?php
        echo Myclass::t('APP240');
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/purchaseorder/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/purchaseorder/index',
                'tagName' => 'table',
                'htmlOptions' => array(
                    'class' => 'table',
                ),
                'itemsCssClass' => 'table table-striped table-bordered table-hover grid-table',
                'template' =>
                '<tr class="paginate-row"><td>{summary}</td><td>{pager}</td></tr>' .
                '<tr><td  class="bn" colspan="2">{items}</td></tr>' .
                '<tr class="paginate-row"><td>{summary}</td><td>{pager}</td></tr>',
                'pagerCssClass' => 'dataTables_paginate paging_bootstrap pagination',
                'summaryCssClass' => 'dataTables_info',
                'summaryText' => '<div id="DataTables_Table_0_length" class="dataTables_length"><label>' .
                CHtml::dropDownList('pageSize', $pageSize, Yii::app()->params['PAGE_SIZE_LIST'], array(
                    'onchange' => "$.fn.yiiGridView.update('categories-grid',{ data:{pageSize: $(this).val() }})",
                )) .
                '&nbsp; records per page</label></div>',
                'pager' => array(
                    'header' => false,
                    'cssFile' => false,
                    'maxButtonCount' => 5,
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'firstPageCssClass' => 'previous',
                    'lastPageCssClass' => 'next',
                    'firstPageLabel' => '<<',
                    'lastPageLabel' => '>>',
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                ),
                'columns' => array(
                                            array(
                            'name' => 'po_date',
                            'type' => 'raw',
                            'value' => 'date("Y-m-d", strtotime(CHtml::encode($data->po_date)))',
                            'filter' => CHtml::activeTextField($model, 'po_date', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'po_vendor',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->poVendor->ven_name)',
                            'filter' => CHtml::activeTextField($model, 'po_vendor', array('class' => 'form-control input-sm')),
                        ),
//                                            array(
//                            'name' => 'po_invoice',
//                            'type' => 'raw',
//                            'value' => 'CHtml::encode($data->po_invoice)',
//                            'filter' => CHtml::activeTextField($model, 'po_invoice', array('class' => 'form-control input-sm')),
//                        ),
                                            array(
                            'name' => 'po_total',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->po_total)',
                            'filter' => CHtml::activeTextField($model, 'po_total', array('class' => 'form-control input-sm')),
                        ),
//                                            array(
//                            'name' => 'po_paid',
//                            'type' => 'raw',
//                            'value' => 'CHtml::encode($data->po_paid)',
//                            'filter' => CHtml::activeTextField($model, 'po_paid', array('class' => 'form-control input-sm')),
//                        ),
                                            array(
                            'name' => 'po_status',
                            'type' => 'raw',
                            'value' => function($data) { 
											$lbl_cls = ($data->po_status == 1) ? 'label-success' : 'label-danger'; 
return '<span class="label '.$lbl_cls.' label-mini">' . Myclass::getStatus($data->po_status) . '</span>'; 
},
                            'filter' => CHtml::activeDropDownList($model, 'po_status', Myclass::getStatus(), array('empty' => Myclass::t('APP61'), 'class' => 'form-control input-sm')),
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