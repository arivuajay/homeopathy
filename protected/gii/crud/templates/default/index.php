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
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/<?php echo $this->UniqueControllerID;?>/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
           <?php echo "<?php"; ?> 
            $this->widget('MyGridView', array(
                'id' => '<?php echo $this->class2id($this->modelClass); ?>',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/<?php echo $this->UniqueControllerID;?>/index'),
                'columns' => array(
                    <?php foreach($this->tableSchema->columns as $column) {
                        if($column->isPrimaryKey || in_array($column->dbType,array('text','longtext'))) continue;
                        
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