<section class="panel">
    <header class="panel-heading">
        <?php
        echo Myclass::t('APP57');
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;' . Myclass::t('APP59'), array('/portal/medcategories/create'), array('class' => 'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php
            $this->widget('MyGridView', array(
                'id' => 'categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'ajaxUrl' => $this->createUrl('/portal/medcategories/index'),
                'columns' => array(
                    array(
                        'name' => 'med_cat_name',
                        'type' => 'raw',
                        'value' => 'CHtml::encode($data->med_cat_name)',
                        'filter' => CHtml::activeTextField($model, 'med_cat_name', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'med_cat_unit',
                        'type' => 'raw',
                        'value' => 'Myclass::getMedicineUnit($data->med_cat_unit)',
                        'filter' => CHtml::activeDropDownList($model, 'med_cat_unit', Myclass ::getMedicineUnit(), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
//                        'filter' => CHtml::activeTextField($model, 'med_cat_unit', array('class' => 'form-control input-sm')),
                    ),
                    array(
                        'name' => 'active',
                        'header' => 'Status',
                        'type' => 'raw',
                        'value' => function($data) {
                            $lbl_cls = ($data->med_cat_status == 1) ? "label-success" : "label-danger" ;
                            return '<span class="label '.$lbl_cls.' label-mini">' . Myclass::getStatus($data->med_cat_status) . '</span>';
                        },
                        'filter' => CHtml::activeDropDownList($model, 'med_cat_status', Myclass::getStatus(), array('empty' => Myclass::t("APP61"), 'class' => 'form-control input-sm')),
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'buttons' => array(
                            'view' => array(
                                'label' => '<i class="fa fa-book"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-success btn-xs', 'title' => Myclass::t("APP67")),
                            ),
                            'update' => array(
                                'label' => '<i class="fa fa-pencil"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-primary btn-xs', 'title' => Myclass::t("APP65")),
                            ),
                            'delete' => array(
                                'label' => '<i class="fa fa-trash-o"></i>',
                                'imageUrl' => false,
                                'options' => array('class' => 'btn btn-danger btn-xs', 'title' => Myclass::t("APP66")),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>