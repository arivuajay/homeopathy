<?php
/* @var $this DoctorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<!--<h1>Users</h1>-->
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><?php echo Myclass::t('APP101'); ?><?php echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;'.Myclass::t('APP59'),array('/portal/doctors/create'),array('class'=>'btn btn-sm btn-success pull-right'));?></h3>
        
                          </header>
                          <div class="panel-body">
                           <div class="adv-table">
                                    <table  class="display table table-bordered table-striped datatable" id="example">
                                      <thead>
                                      <tr>
                                          <th>S.no</th>
                                          <th> <?php echo Myclass::t('APP103'); ?></th>
                                          <th><?php echo Myclass::t('Created'); ?></th>
                                          <th class="text-center"> <?php echo Myclass::t('APP102'); ?></th>
                                      </tr>
                                      </thead>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
 </table>
                                </div>
</div>
                      </section>
                  </div>
              </div>