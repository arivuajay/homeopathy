<?php 
$this->breadcrumbs=array(
	'Patients',
);

$this->flashMessages = Yii::app()->user->getFlashes();
?>

<section class="panel">
    <header class="panel-heading">
        <?php echo Myclass::t('APP406'); ?>
        <?php        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/patients/create'), array('class' => 'btn btn-sm btn-success pull-right', 'title'=>'Create'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php  
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/patients/index',
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
                            'name' => 'pt_firstname',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_firstname)',
                            'filter' => CHtml::activeTextField($model, 'pt_firstname', array('class' => 'form-control input-sm')),
							
                        ),
                                            array(
                            'name' => 'pt_sex',
                            'type' => 'raw',
                            'value' => 'Myclass::getSex($data->pt_sex)',
			    'filter' => CHtml::activeTextField($model, 'pt_sex', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_email',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_email)',
                            'filter' => CHtml::activeTextField($model, 'pt_email', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_city',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->ptCity->city)',
                            'filter' => CHtml::activeTextField($model, 'pt_city', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_mobile',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_mobile)',
                            'filter' => CHtml::activeTextField($model, 'pt_mobile', array('class' => 'form-control input-sm')),
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