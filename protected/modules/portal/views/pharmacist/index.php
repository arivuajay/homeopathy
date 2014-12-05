<?php 
$this->breadcrumbs=array(
	'Pharmacists',
);

$this->flashMessages = Yii::app()->user->getFlashes();
?>

<section class="panel">
    <header class="panel-heading">
       <?php echo Myclass::t('APP301'); ?> 
       <?php        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/pharmacist/create'), array('class' => 'btn btn-sm btn-success pull-right', 'title'=>'Create'));
       ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/pharmacist/index',
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
                                    'name' => 'phr_first_name',
                                    'type' => 'raw',
                                    'value' => 'CHtml::encode($data->phr_first_name)',
                                    'filter' => CHtml::activeTextField($model, 'phr_first_name', array('class' => 'form-control input-sm')),
                                ),
                    
                                array(
                                    'name' => 'phr_last_name',
                                    'type' => 'raw',
                                    'value' => 'CHtml::encode($data->phr_last_name)',
                                    'filter' => CHtml::activeTextField($model, 'phr_last_name', array('class' => 'form-control input-sm')),
                                ),
                                            
                                array(
                                    'name' => 'phr_city',
                                    'type' => 'raw',
                                    'value' => 'CHtml::encode($data->phrCity->city)',
                                    'filter' => CHtml::activeTextField($model, 'phr_city', array('class' => 'form-control input-sm')),
                                ),
                    
                                array(
                                    'name' => 'phr_state',
                                    'type' => 'raw',
                                    'value' => 'CHtml::encode($data->phrState->state)',
                                    'filter' => CHtml::activeTextField($model, 'phr_state', array('class' => 'form-control input-sm')),
                                ),
                    
                                array(
                                    'name' => 'phr_country',
                                    'type' => 'raw',
                                    'value' => 'CHtml::encode($data->phrCountry->country)',
                                    'filter' => CHtml::activeTextField($model, 'phr_country', array('class' => 'form-control input-sm')),
                                ),
                                            
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'buttons' => array(
                            'view' => array(
                                'label' => '<i class="fa fa-book"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-success btn-xs', 'title'=>'View'),
                            ),
                            'update' => array(
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs', 'title'=>'Update'),
                            ),
                            'delete' => array(
                                'label' => '<i class="fa fa-trash-o"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-danger btn-xs', 'title'=>'Delete'),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>