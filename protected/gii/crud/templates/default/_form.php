<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
	'enableAjaxValidation'=>true,
)); ?>\n"; ?>

<?php echo "<?php //echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach ($this->tableSchema->columns as $column) {
    if ($column->autoIncrement)
        continue;
    ?>
    <div class="form-group">
        <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
        <?php echo "<div class=\"col-lg-10\">\n"; ?>
        <?php if (!Myclass::endsWith($column->name, 'status')) { ?>
            <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
        <?php } else { ?>
            <?php echo "<?php echo \$form->checkBox(\$model, '{$column->name}', array('data-toggle' => 'switch')); ?>\n"; ?>
        <?php } ?>
        <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
        <?php echo "</div>\n"; ?>
    </div>
    <?php
}
?>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>\n"; ?>
    </div>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
<!-- form -->