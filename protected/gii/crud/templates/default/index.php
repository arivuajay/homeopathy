<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>
?>
<section class="panel">
    <header class="panel-heading">
        <?php echo $label; ?>
        <?php echo "<?php"; ?>        
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/<?php echo strtolower($this->modelClass); ?>/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php echo "<?php"; ?> 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => Yii::app()->baseUrl . '/portal/<?php echo strtolower($this->modelClass); ?>/index',
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
                    <?php foreach($this->tableSchema->columns as $column) {
                        if($column->isPrimaryKey || in_array($column->dbType,array('text','logtext'))) continue;
                        
                        if(!Myclass::endsWith($column->name,'status')){
                            $value     = "'CHtml::encode(\$data->$column->name)'";
                            $filterVal = "CHtml::activeTextField(\$model, '$column->name', array('class' => 'form-control input-sm'))";
                        }else{
                            $value     = "function(\$data) { \n".
                                            "\t\t\t\t\t\t\t\t\t\t\t\$lbl_cls = (\$data->{$column->name} == 1) ? 'label-success' : 'label-danger'; \n".
                                            "return '<span class=\"label '.\$lbl_cls.' label-mini\">' . Myclass::getStatus(\$data->{$column->name}) . '</span>'; \n".
                                          "}";
                            $filterVal = "CHtml::activeDropDownList(\$model, '$column->name', Myclass::getStatus(), array('empty' => '-Select-', 'class' => 'form-control input-sm'))";
                        }
                        ?>
                        array(
                            'name' => '<?php echo $column->name; ?>',
                            'type' => 'raw',
                            'value' => <?php echo $value; ?>,
                            'filter' => <?php echo $filterVal; ?>,
                        ),
                    <?php } ?>                
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