<?php
/* @var $this PurchaseorderController */
/* @var $model PurchaseOrder */

$this->breadcrumbs = array(
    'Purchase Orders' => array('index'),
    $model->po_id,
);

$this->menu = array(
    array('label' => 'List PurchaseOrder', 'url' => array('index')),
    array('label' => 'Create PurchaseOrder', 'url' => array('create')),
    array('label' => 'Update PurchaseOrder', 'url' => array('update', 'id' => $model->po_id)),
    array('label' => 'Delete PurchaseOrder', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->po_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage PurchaseOrder', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><h3><?php echo Myclass::t('APP238'); ?> #<?php echo $model->po_id; ?></h3></header>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'po_id',
                        array(
                            'label' => Myclass::t('APP87'),
                            'value' => date("Y-m-d", strtotime($model->po_date))
                        ),
                        array(
                            'label' => Myclass::t('APP88'),
                            'value' => $model->poVendor->ven_name
                        ),
                        'po_invoice',
                        'po_memo',
                        'po_total',
                        'po_paid',
                        array(
                            'label' => Myclass::t('APP55'),
                            'value' => Myclass::getStatus($model->po_status)
                        ),
                        'po_created_by',
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
                        <?php foreach ($purchase_medicine_list as $key => $med) { ?>
                            <tr id="med_tr_<?php echo $key + 1 ?>">
                                <td><p><?php echo $med->itmMed->med_name ?> </p>
                                    <p><b><?php echo Myclass::t('APP77'); ?> : </b><?php echo $med->itmPkg->pkg_med_unit ?></p>
                                    <p><b><?php echo Myclass::t('APP201'); ?></b> : <?php echo $med->itm_batch_no ?><p>
                                    <p><b><?php echo Myclass::t('APP203'); ?></b> : <?php echo date('Y-m-d', strtotime($med->itm_exp_date)) ?><p>
                                    <p><b><?php echo Myclass::t('APP202'); ?></b> : <?php echo date('Y-m-d', strtotime($med->itm_manf_date)) ?><p>
                                </td>
                                <td class="text-center"><?php echo $med->itm_qty ?></td>
                                <td class="text-right"><?php echo $med->itm_mrp_price ?></td>
                                <td class="text-right"><?php echo $med->itm_vat_tax ?></td>
                                <td class="text-right"><?php echo $med->itm_discount ?></td>
                                <td class="text-right"><?php echo $med->itm_net_rate ?></td>
                                <td class="text-right"><?php echo $med->itm_total_price ?></td>
                        <?php } ?>

                    </tbody>
                </table>
                <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/purchaseorder/'), array('class' => 'btn btn-sm btn-default')); ?>    
            </div>    
        </section>
    </div>
</div>
