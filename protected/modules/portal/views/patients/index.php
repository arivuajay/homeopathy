<?php
/* @var $this PatientsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Profiles',
);
?>
<section class="panel">
    <header class="panel-heading">
        Patient Profiles        <?php        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/patients/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php  $sex = Myclass::getSex();
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
                                           /* array(
                            'name' => 'user_id',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->user_id)',
                            'filter' => CHtml::activeTextField($model, 'user_id', array('class' => 'form-control input-sm')),
                        ),*/
                                            array(
                            'name' => 'pt_firstname',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_firstname)',
                            'filter' => CHtml::activeTextField($model, 'pt_firstname', array('class' => 'form-control input-sm')),
							
                        ),
                                          /*  array(
                            'name' => 'pt_lastname',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_lastname)',
                            'filter' => CHtml::activeTextField($model, 'pt_lastname', array('class' => 'form-control input-sm')),
                        ),*/ 
                                            array(
                            'name' => 'pt_sex',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_sex)',
							'filter' => CHtml::activeTextField($model, 'pt_sex', array('class' => 'form-control input-sm')),
                         
                        ),
                                            array(
                            'name' => 'pt_email',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_email)',
                            'filter' => CHtml::activeTextField($model, 'pt_email', array('class' => 'form-control input-sm')),
                        ),
                                           /* array(
                            'name' => 'pt_dob',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_dob)',
                            'filter' => CHtml::activeTextField($model, 'pt_dob', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_bloodgroup',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_bloodgroup)',
                            'filter' => CHtml::activeTextField($model, 'pt_bloodgroup', array('class' => 'form-control input-sm')),
                        ),
                                           array(
                            'name' => 'pt_height',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_height)',
                            'filter' => CHtml::activeTextField($model, 'pt_height', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_weight',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_weight)',
                            'filter' => CHtml::activeTextField($model, 'pt_weight', array('class' => 'form-control input-sm')),
                        ),*/
                                            array(
                            'name' => 'pt_city',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->ptCity->city)',
                            'filter' => CHtml::activeTextField($model, 'pt_city', array('class' => 'form-control input-sm')),
                        ),
                                            /*array(
                            'name' => 'pt_state',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_state)',
                            'filter' => CHtml::activeTextField($model, 'pt_state', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_country',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_country)',
                            'filter' => CHtml::activeTextField($model, 'pt_country', array('class' => 'form-control input-sm')),
                        ),
                                            array(
                            'name' => 'pt_telephone',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->pt_telephone)',
                            'filter' => CHtml::activeTextField($model, 'pt_telephone', array('class' => 'form-control input-sm')),
                        ),*/
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
                                'options' => array('class' => 'btn btn-success btn-xs'),
								
                            ),
                            'update' => array(
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs'),
								//'url'=>'Yii::app()->createUrl("portal/patients/update", array("id"=>$data->user_id))',
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