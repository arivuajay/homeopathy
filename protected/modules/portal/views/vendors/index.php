<?php
/* @var $this VendorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Vendors',
);
?>
<section class="panel">
    <header class="panel-heading">
        <?php echo Myclass::t('APP88'); ?>
        <?php
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/vendors/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/vendors/index',
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
                        'name' => 'ven_name',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->ven_name)',
                        'filter' => CHtml::activeTextField($model, 'ven_name', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'ven_phone_no',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->ven_phone_no)',
                        'filter' => CHtml::activeTextField($model, 'ven_phone_no', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'ven_email',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->ven_email)',
                        'filter' => CHtml::activeTextField($model, 'ven_email', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'ven_status',
                        'type' => 'raw',
                        'value' => function($data) {
                            $lbl_cls = ($data->ven_status == 1) ? 'label-success' : 'label-danger';
                            return '<span class="label ' . $lbl_cls . ' label-mini">' . Myclass::getStatus($data->ven_status) . '</span>';
                        },
                        'filter' => CHtml::activeDropDownList($model, 'ven_status', Myclass::getStatus(), array('empty' => '-Select-', 'class' => 'form-control input-sm')),
                    ),
//                    array(
//                        'name' => 'ven_created_by',
//                        'type' => 'raw',
////                        'value' => 'CHtml::encode($data->ven_created_by)',
//                        'value' => 'Users::model()->findByPk($data->ven_created_by)->ur_username',
//                        'filter' => CHtml::activeTextField($model, 'ven_created_by', array('class' => 'form-control input-sm')),
//                    ),
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