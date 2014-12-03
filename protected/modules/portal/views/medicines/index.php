<?php
/* @var $this MedicinesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Medicines',
);
?>
<section class="panel">
    <header class="panel-heading">
        Medicines        <?php
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/medicines/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/medicines/index',
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
                        'name' => 'med_cat_id',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->medCat->med_cat_name)',
                        'filter' => CHtml::activeDropDownList($model, 'med_cat_id',  CHtml ::listData(MedCategories::model()->findAll(), 'med_cat_id', 'med_cat_name'), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
//                        'filter' => CHtml::activeTextField($model, 'med_cat_id', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'med_name',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->med_name)',
                        'filter' => CHtml::activeTextField($model, 'med_name', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'med_desc',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->med_desc)',
                        'filter' => CHtml::activeTextField($model, 'med_desc', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'med_status',
                        'type' => 'raw',
                        'value' => function($data) {
                            $lbl_cls = ($data->med_status == 1) ? 'label-success' : 'label-danger';
                            return '<span class="label ' . $lbl_cls . ' label-mini">' . Myclass::getStatus($data->med_status) . '</span>';
                        },
                        'filter' => CHtml::activeDropDownList($model, 'med_status', Myclass::getStatus(), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
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