<?php
/* @var $this DoctorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Users',
);

$this->menu = array(
    array('label' => 'Create Users', 'url' => array('create')),
    array('label' => 'Manage Users', 'url' => array('admin')),
);
?>
<section class="panel">
    <header class="panel-heading">
        <?php
        echo Myclass::t('APP101');
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/doctors/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php
            $this->widget('MyGridView', array(
                'id' => 'doctors-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/doctors/index'),
                'columns' => array(
                    array(
                        'name' => 'doc_fullname',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->doc_fullname)',
                        'filter' => CHtml::activeTextField($model, 'doc_fullname', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'doc_speciality',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->doc_speciality)',
                        'filter' => CHtml::activeTextField($model, 'doc_speciality', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'doc_mobile_no',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->doc_mobile_no)',
                        'filter' => CHtml::activeTextField($model, 'doc_mobile_no', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'doc_city',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->docCity->city)',
                        'filter' => CHtml::activeTextField($model, 'doc_city', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'buttons' => array(
                            'view' => array(
                                'url'=>'Yii::app()->controller->createUrl("/portal/doctors/view", array("id"=>$data->user_id))',
                                'label' => '<i class="fa fa-book"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-success btn-xs'),
                            ),
                            'update' => array(
                                'url'=>'Yii::app()->controller->createUrl("/portal/doctors/update", array("id"=>$data->user_id))',
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs'),
                            ),
                            'delete' => array(
                                'url'=>'Yii::app()->controller->createUrl("/portal/doctors/delete", array("id"=>$data->user_id))',
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