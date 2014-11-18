<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>

<div class="view">

<?php
echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n";
$count=0;
?>
<table class="table table-striped table-advance table-hover">
    <thead>
        <tr>
<?php
foreach($this->tableSchema->columns as $column)
{
    echo "\t<th><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</th>\n";
}
?>
        </tr>
    </thead>
    <tbody>
        <tr>
<?php
foreach($this->tableSchema->columns as $column)
{
    echo "\t<td>\n";
    echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n";
    echo "\t</td>\n";
}
?>
        </tr>
    </tbody>
</table>
<?php
if($count>=7)
	echo "\t*/ ?>\n";
?>
</div>