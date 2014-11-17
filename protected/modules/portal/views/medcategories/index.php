<?php
/* @var $this MedcategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Med Categories',
);

$this->menu=array(
	array('label'=>'Create MedCategories', 'url'=>array('create')),
	array('label'=>'Manage MedCategories', 'url'=>array('admin')),
);
?>

<section class="panel">
    <header class="panel-heading">
        <?php echo Myclass::t('APP57')?>
    </header>
    <div class="panel-body">
          <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th><?php echo Myclass::t('APP51')?></th>
                    <th><?php echo Myclass::t('APP52')?></th>
                    <th><?php echo Myclass::t('APP53')?></th>
                    <th class="hidden-phone"><?php echo Myclass::t('APP54')?></th>
                    <th class="hidden-phone"><?php echo Myclass::t('APP102')?></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_view',
                    )); 
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th><?php echo Myclass::t('APP51')?></th>
                    <th><?php echo Myclass::t('APP52')?></th>
                    <th><?php echo Myclass::t('APP53')?></th>
                    <th class="hidden-phone"><?php echo Myclass::t('APP54')?></th>
                    <th class="hidden-phone"><?php echo Myclass::t('APP102')?></th>
                </tr>
                </tfoot>
    </table>
          </div>
    </div>
</section>

