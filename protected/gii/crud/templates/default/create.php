<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Create <?php echo $this->modelClass; ?></header>
            <div class="panel-body">
                <?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
            </div>
        </section>
    </div>
</div>