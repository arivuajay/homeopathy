<?php
/* @var $this SalesorderController */
/* @var $model SalesOrder */

$this->breadcrumbs = array(
    'Sales Orders' => array('index'),
    $model->so_id,
);

$this->menu = array(
    array('label' => 'List SalesOrder', 'url' => array('index')),
    array('label' => 'Create SalesOrder', 'url' => array('create')),
    array('label' => 'Update SalesOrder', 'url' => array('update', 'id' => $model->so_id)),
    array('label' => 'Delete SalesOrder', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->so_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage SalesOrder', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP239'); ?> #<?php echo $model->so_id; ?></h3></header>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'so_id',
                        array(
                            'label' => Myclass::t('APP233'),
                            'value' => Myclass::getSaleType($model->so_type)
                        ),
                        array(
                            'label' => Myclass::t('APP232'),
                            'value' => date("Y-m-d", strtotime($model->so_date))
                        ),
                        array(
                            'label' => Myclass::t('APP237'),
                            'value' => $model->so_type == "1" ? $model->user->patient->pt_firstname : $model->vendor->ven_name,
                        ),
                        array(
                            'label' => Myclass::t('APP235'),
                            'value' => $model->doc_user->doctor->doc_firstname,
                        ),
                        'so_memo',
                        'so_total',
                        'so_paid',
                        array(
                            'label' => Myclass::t('APP55'),
                            'value' => Myclass::getStatus($model->so_status)
                        ),
                    ),
                ));
                ?>

                <table class="table table-striped table-advance" id="medicines_list">
                    <thead>
                        <tr>
                            <th><i class="fa fa-medkit"></i> <?php echo Myclass::t('APP215'); ?></th>
                            <th class="text-center"><i class="fa fa-list"></i> <?php echo Myclass::t('APP206'); ?></th>
                            <th class="text-right"><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP207'); ?></th>
                            <th class="text-right"><?php echo Myclass::t('APP208'); ?></th>
                            <th class="text-right"><?php echo Myclass::t('APP209'); ?></th>
                            <th class="text-right"><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP210'); ?></th>
                            <th class="text-right"><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP211'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($sales_medicine_list as $key => $med) { ?>
                            <tr id="med_tr_<?php echo $key + 1 ?>">
                                <td><p><?php echo $med->itmMed->med_name ?> <b><?php echo Myclass::t('APP77'); ?> : </b><?php echo $med->itmPkg->pkg_med_unit ?></p>
                                    <p><b><?php echo Myclass::t('APP201'); ?></b> : <?php echo $med->itm_batch_no ?><p>
                                </td>
                                <td class="text-center"><?php echo $med->itm_qty ?></td>
                                <td class="text-right"><?php echo $med->itm_mrp_price ?></td>
                                <td class="text-right"><?php echo $med->itm_vat_tax ?></td>
                                <td class="text-right"><?php echo $med->itm_discount ?></td>
                                <td class="text-right"><?php echo $med->itm_net_rate ?></td>
                                <td class="text-right"><?php echo $med->itm_total_price ?></td>
                            </tr>
<?php } ?>

                    </tbody>
                </table>
<?php echo CHtml::link(Myclass::t('APP64'), array('/portal/salesorder/'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>
