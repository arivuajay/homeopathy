<?php
/* @var $this MedstockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Med Stocks',
);
?>
<section class="panel">
    <header class="panel-heading">
        <?php
        echo Myclass::t('APP246');
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php
            $this->widget('MyGridView', array(
                'id' => 'med-stock',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/medstock/index'),
                'columns' => array(
                    array(
                        'name' => 'stk_med_id',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->stkMed->med_name)',
                        'filter' => CHtml::activeTextField($model, 'stk_med_id', array('class' => 'form-control input-sm')),
//                        'filter' => CHtml::activeDropDownList($model, 'stk_med_id', CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name'), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'stk_pkg_id',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->stkPkg->pkg_med_unit)',
                        'filter' => CHtml::activeTextField($model, 'stk_pkg_id', array('class' => 'form-control input-sm')),
//                        'filter' => CHtml::activeDropDownList($model, 'stk_pkg_id', CHtml::listData(MedicinePkg::model()->findAll(), 'pkg_id', 'pkg_med_unit'), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'stk_batch_no',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->stk_batch_no)',
                        'filter' => CHtml::activeTextField($model, 'stk_batch_no', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'stk_avail_units',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->stk_avail_units)',
                        'filter' => CHtml::activeTextField($model, 'stk_avail_units', array('class' => 'form-control input-sm')),
                    ),
//                    array(
//                        'class' => 'CButtonColumn',
//                        'header' => 'Action',
//                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
//                        'buttons' => array(
//                            'view' => array(
//                                'label' => '<i class="fa fa-book"></i>',
//                                'imageUrl' => false,
//                                'options' => array('class' => 'btn btn-success btn-xs'),
//                            ),
//                            'update' => array(
//                                'label' => '<i class="fa fa-pencil"></i>',
//                                'imageUrl' => false,
//                                'options' => array('class' => 'btn btn-primary btn-xs'),
//                            ),
//                            'delete' => array(
//                                'label' => '<i class="fa fa-trash-o"></i>',
//                                'imageUrl' => false,
//                                'options' => array('class' => 'btn btn-danger btn-xs'),
//                            ),
//                        ),
//                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>