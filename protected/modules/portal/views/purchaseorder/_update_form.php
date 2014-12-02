<?php
/* @var $this PurchaseorderController */
/* @var $model PurchaseOrder */
/* @var $form CActiveForm */
?>

<style type="text/css">
    #medicines_list td {
        line-height: 18px;
    }
</style>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'purchase-order-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    )
        ));
?>


<?php //echo $form->errorSummary($model); ?>

<?php echo $form->hiddenField($model, 'tenant', array('value' => $model->getTenant())) ?>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_date', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-calendar"></i>
            <?php echo $form->textField($model, 'po_date', array('class' => 'form-control form-control-inline input-medium default-date-picker')); ?>
        </div>
        <?php echo $form->error($model, 'po_date', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_vendor', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-6">
        <?php $vendors = CHtml::listData(Vendors::model()->isActive()->findAll(), 'ven_id', 'ven_name') ?>        
        <?php echo $form->dropDownList($model, 'po_vendor', $vendors, array('empty' => Myclass::t('APP61'), 'class' => "form-control")) ?>
        <?php echo $form->error($model, 'po_vendor', array('class' => 'col-lg-12')); ?>
    </div>
    <div class="col-lg-2">
        <?php echo CHtml::button(Myclass::t('APP80'), array('class' => 'btn btn-default', 'onclick' => 'location.href="' . $this->createUrl('/portal/vendors/create') . '"')) ?>
        <!--        <button class="btn btn-default" type="button">Default</button>-->
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_invoice', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-file-text"></i>
            <?php echo $form->textField($model, 'po_invoice', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'po_invoice', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_total', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-rupee"></i>
            <?php echo $form->textField($model, 'po_total', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'po_total', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_paid', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-rupee"></i>
            <?php echo $form->textField($model, 'po_paid', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'po_paid', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_status', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php echo $form->checkBox($model, 'po_status', array('data-toggle' => 'switch')); ?>
        <?php echo $form->error($model, 'po_status'); ?>
    </div>
</div>
<div class="clearfix"></div>
<div class="form-group col-lg-12">
    <?php echo $form->labelEx($model, 'po_memo', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
        <?php echo $form->textArea($model, 'po_memo', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'po_memo', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<?php echo $form->hiddenField($model, 'po_created_by', array('value' => Yii::app()->user->getId())) ?>
<div class="clearfix"></div>

<div class="form-group">
    <div class="col-sm-12">
        <?php echo CHtml::link('<i class="fa fa-plus-square"></i>&nbsp&nbsp' . Myclass::t('APP213'), '#medicine_form', array('class' => 'btn btn-sm btn-success pull-left', 'data-toggle' => "modal")) ?>
    </div>
</div>

<!--Hidden Medicine Purchase Item Rows-->
<div style="display: none" class="hidden_medicine_div">
    <?php foreach ($purchase_medicine_list as $key => $med) {?>
        <div id="medicine_row_<?php echo $key+1 ?>" class="medicine_row">
            <input type="hidden" value="<?php echo $key+1 ?>" name="PurchaseOrderMedicines[<?php echo $key+1 ?>][r_index]" id="PurchaseOrderMedicines_r_index_<?php echo $key+1 ?>">
            <?php foreach($med as $index => $value){ ?>
                <input type="hidden" value="<?php echo $value?>" name="PurchaseOrderMedicines[<?php echo $key+1 ?>][<?php echo $index ?>]" id="PurchaseOrderMedicines_<?php echo $index ?>_<?php echo $key+1 ?>">
            <?php } ?>
        </div>
    <?php } ?>
</div>


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
            <th class="text-center"><i class=" fa fa-edit"></i> <?php echo Myclass::t('APP102'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($purchase_medicine_list as $key => $med) { ?>
            <tr id="med_tr_<?php echo $key + 1 ?>">
                <td><p><?php echo $med->itmMed->med_name ?> <b><?php echo Myclass::t('APP77'); ?> : </b><?php echo $med->itmPkg->pkg_med_unit ?></p>
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
                <td class="text-center">
                    <a href="javascript:edit(<?php echo $key + 1 ?>)" title="<?php echo Myclass::t('APP65'); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                    <a href="javascript:delete_row(<?php echo $key + 1 ?>)" title="<?php echo Myclass::t('APP66'); ?>"><i class="fa fa-times"></i></a>
                </td>            
            </tr>
        <?php } ?>

    </tbody>
</table>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? Myclass::t('APP59') : Myclass::t('APP82'), array('class' => 'btn btn-info')); ?>
        <?php echo CHtml::link(Myclass::t('APP64'), array('/portal/purchaseorder/'), array('class' => 'btn btn-sm btn-default')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->

<section class="panel">
    <div class="panel-body">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="medicine_form" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"><?php echo Myclass::t('APP213'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php
                            $form2 = $this->beginWidget('CActiveForm', array(
                                'id' => 'medicine-form',
                                'htmlOptions' => array(
                                    'role' => 'form',
                                    'onsubmit' => "return false;"
                                ),
                                'action' => array('/portal/purchaseorder/medicineadd'),
                                'enableAjaxValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    'afterValidate' => 'js:aftervalidate'
                                )
                            ));
                            ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_med_id'); ?>
                                    <?php $medicines = CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name'); ?>
                                    <?php
                                    echo $form2->dropDownList($purchase_medicines, 'itm_med_id', $medicines, array(
                                        'class' => "form-control",
                                        'prompt' => Myclass::t('APP61'),
                                        'ajax' => array(
                                            'type' => 'GET',
                                            'url' => $this->createUrl('/portal/medicinepkg/loadpackages'),
                                            'success' => 'function(ret){'
                                            . '$("#package_dd_div").html(ret);'
                                            . 'var med_name = $("#PurchaseOrderMedicines_itm_med_id :selected").text();'
                                            . '$("#PurchaseOrderMedicines_itm_med_name").val(med_name);'
                                            . '}',
                                            'data' => array('med_id' => 'js:this.value'),
                                        )
                                    ));
                                    ?>
                                    <?php echo $form2->error($purchase_medicines, 'itm_med_id', array('class' => 'col-lg-12')); ?>
                                </div>
                            </div>
                            <input type="hidden" id="PurchaseOrderMedicines_r_index" name="PurchaseOrderMedicines[r_index]">
                            <?php echo $form2->hiddenField($purchase_medicines, 'itm_med_name', array('class' => 'med_hidden')) ?>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_pkg_id'); ?>
                                    <div id="package_dd_div">
                                        <?php
                                        echo $form2->dropDownList($purchase_medicines, 'itm_pkg_id', '', array(
                                            'class' => 'form-control',
                                            'empty' => Myclass::t('APP205'),
                                            'onchange' => 'setPackage()'
                                        ));
                                        ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_pkg_id"); ?>
                                </div>  
                            </div>
                            <div class="clearfix"></div>

                            <?php echo $form2->hiddenField($purchase_medicines, 'itm_pkg_name', array('class' => 'med_hidden')) ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                        <?php echo $form2->labelEx($purchase_medicines, 'itm_batch_no') ?>
                                    <div class="iconic-input right">
                                        <i class="fa fa-barcode"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_batch_no", array('class' => "form-control")); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_batch_no"); ?>                            
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                        <?php echo $form2->labelEx($purchase_medicines, 'itm_manf_date') ?>
                                    <div class="iconic-input right">
                                        <i class="fa fa-calendar"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_manf_date", array('class' => "form-control default-date-picker", 'value' => '')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_manf_date"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                        <?php echo $form2->labelEx($purchase_medicines, 'itm_exp_date') ?>
                                    <div class="iconic-input right">
                                        <i class="fa fa-calendar"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_exp_date", array('class' => "form-control default-date-picker", 'value' => '')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_exp_date"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_qty') ?>
                                    <div class="iconic-input right">
                                        <i class="fa fa-list"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_qty", array('class' => "form-control calc-price", 'placeholder' => '')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_qty"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_mrp_price') ?>
                                    <div class="iconic-input right">
                                        <i class="fa fa-rupee"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_mrp_price", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_mrp_price"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_vat_tax') ?>
                                    <div class="iconic-input right">
                                        <i class="fa  fa-plus-square"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_vat_tax", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_vat_tax"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_discount') ?>
                                    <div class="iconic-input right">
                                        <i class="fa  fa-minus-square"></i>
                                    <?php echo $form2->textField($purchase_medicines, "itm_discount", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_discount"); ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <?php echo $form2->hiddenField($purchase_medicines, 'itm_net_rate', array('class' => 'med_hidden')) ?>
                            <?php echo $form2->hiddenField($purchase_medicines, 'itm_total_price', array('class' => 'med_hidden')) ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo CHtml::submitButton(Myclass::t('APP82'), array('class' => 'btn btn-info')); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group right">
                                    <p><?php echo Myclass::t('APP210'); ?> : <i class="fa fa-rupee"></i><span id="net_rate_span" class="med_hidden_span"></span></p>
                                    <p><?php echo Myclass::t('APP211'); ?> : <i class="fa fa-rupee"></i><b><span id="total_amt_span" class="med_hidden_span"></span></b></p>
                                </div>
                            </div>


                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $(".calc-price").focusout(function () {
            var qty = $('#PurchaseOrderMedicines_itm_qty').val();
            var mrp = $('#PurchaseOrderMedicines_itm_mrp_price').val();
            var disc_perc = $('#PurchaseOrderMedicines_itm_discount').val();

            var valid = ($.isNumeric(qty) && $.isNumeric(mrp) && $.isNumeric(disc_perc));

            if (valid) {
                var disc_amt = (mrp * (disc_perc / 100));
                var net_rate = (mrp - disc_amt).toFixed(2);
                var total_amt = (net_rate * qty).toFixed(2);

                $("#PurchaseOrderMedicines_itm_net_rate").val(net_rate);
                $("#PurchaseOrderMedicines_itm_total_price").val(total_amt);

                $("#net_rate_span").html(net_rate);
                $("#total_amt_span").html(total_amt);
            }
        });

        $('#medicine_form').on('hidden.bs.modal', function () {
            reset_form();
        })
    });

    var length = <?php echo count($purchase_medicine_list) ?>;

    function aftervalidate(form, data, hasError)
    {
        if (hasError == false) {
            var data = $("#medicine-form").serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/portal/purchaseorder/medicineadd"); ?>',
                data: data,
                success: function (data) {
                    //Add a row in table
                    var insert_row = '';
                    data['r_index'] == '' ? mode = 'add' : mode = 'edit';

                    if (mode == 'add') {
                        length++;
                        var count = length;
                        insert_row += '<tr id="med_tr_' + count + '">';
                    }
                    else if (mode == 'edit') {
                        var count = data['r_index'];
                    }

                    insert_row += '<td><p>' + data['itm_med_name'] + ' (<b><?php echo Myclass::t('APP77'); ?> : </b>' + data['itm_pkg_name'] + ') </p>';
                    insert_row += '<p><b><?php echo Myclass::t('APP201'); ?></b> : ' + data['itm_batch_no'] + '<p>';
                    insert_row += '<p><b><?php echo Myclass::t('APP203'); ?></b> : ' + data['itm_exp_date'] + '<p>';
                    insert_row += '<p><b><?php echo Myclass::t('APP202'); ?></b> : ' + data['itm_manf_date'] + '<p></td>';
                    insert_row += '<td class="text-center">' + data['itm_qty'] + '</td>';
                    insert_row += '<td class="text-right">' + Number(data['itm_mrp_price']).toFixed(2) + '</td>';
                    insert_row += '<td class="text-right">' + Number(data['itm_vat_tax']).toFixed(2) + '</td>';
                    insert_row += '<td class="text-right">' + Number(data['itm_discount']).toFixed(2) + '</td>';
                    insert_row += '<td class="text-right">' + Number(data['itm_net_rate']).toFixed(2) + '</td>';
                    insert_row += '<td class="text-right">' + Number(data['itm_total_price']).toFixed(2) + '</td>';
                    insert_row += '<td class="text-center"><a href="javascript:edit(' + count + ')" title="<?php echo Myclass::t('APP65'); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="javascript:delete_row(' + count + ')" title="<?php echo Myclass::t('APP66'); ?>"><i class="fa fa-times"></i></a></td>';

                    if (mode == 'add') {
                        insert_row += '</tr>';
                        $('#medicines_list > tbody:last').append(insert_row);
                    }
                    else if (mode == 'edit') {
                        $('#medicines_list #med_tr_' + count).html(insert_row);
                    }

//                    $('#medicines_list #med_tr_'+count).css('background','#a9d86e');
//                    setTimeout(function() {
//                        $('#medicines_list #med_tr_'+count).css('background','');
//                    }, 2000);

                    //add hidden form fields in main form
                    if (mode == 'add') {
                        var hidden_fields = '';
                        $.each(data, function (index, value) {
                            hidden_fields += '<input type="hidden" id="PurchaseOrderMedicines_' + index + '_' + count + '" name="PurchaseOrderMedicines[' + count + '][' + index + ']" value="' + value + '">';
                        });
                        $('.hidden_medicine_div').append('<div class="medicine_row" id="medicine_row_' + count + '">' + hidden_fields + '</div>');
                        $('#PurchaseOrderMedicines_r_index_' + count).val(count);
                    }
                    else if (mode == 'edit') {
                        $.each(data, function (index, value) {
                            $('#PurchaseOrderMedicines_' + index + '_' + count).val(value);
                        });
                    }

                    //reset form and close the modal
                    reset_form();
                },
                error: function (data) { // if error occured
                    alert("Error occured.please try again");
                },
                dataType: 'json'
            });
        }
    }

    function setPackage() {
        var pkg_name = $("#PurchaseOrderMedicines_itm_pkg_id :selected").text();
        $("#PurchaseOrderMedicines_itm_pkg_name").val(pkg_name);
    }

    function edit(key) {
        $("#PurchaseOrderMedicines_itm_med_id").val($("#PurchaseOrderMedicines_itm_med_id_" + key).val()).change();
        $('#PurchaseOrderMedicines_itm_batch_no').val($("#PurchaseOrderMedicines_itm_batch_no_" + key).val());
        $('#PurchaseOrderMedicines_itm_manf_date').val($("#PurchaseOrderMedicines_itm_manf_date_" + key).val());
        $('#PurchaseOrderMedicines_itm_exp_date').val($("#PurchaseOrderMedicines_itm_exp_date_" + key).val());
        $('#PurchaseOrderMedicines_itm_qty').val($("#PurchaseOrderMedicines_itm_qty_" + key).val());
        $('#PurchaseOrderMedicines_itm_mrp_price').val($("#PurchaseOrderMedicines_itm_mrp_price_" + key).val());
        $('#PurchaseOrderMedicines_itm_vat_tax').val($("#PurchaseOrderMedicines_itm_vat_tax_" + key).val());
        $('#PurchaseOrderMedicines_itm_discount').val($("#PurchaseOrderMedicines_itm_discount_" + key).val());

        $('#PurchaseOrderMedicines_r_index').val($("#PurchaseOrderMedicines_r_index_" + key).val());
        $('#PurchaseOrderMedicines_itm_med_name').val($("#PurchaseOrderMedicines_itm_med_name_" + key).val());
        $('#PurchaseOrderMedicines_itm_pkg_name').val($("#PurchaseOrderMedicines_itm_pkg_name_" + key).val());

        var net_rate = $("#PurchaseOrderMedicines_itm_net_rate_" + key).val();
        var total_amt = $("#PurchaseOrderMedicines_itm_total_price_" + key).val();

        $('#PurchaseOrderMedicines_itm_net_rate').val(net_rate);
        $('#PurchaseOrderMedicines_itm_total_price').val(total_amt);

        $('#net_rate_span').html(net_rate);
        $('#total_amt_span').html(total_amt);

        $(document).ajaxSuccess(function () {
            $("#PurchaseOrderMedicines_itm_pkg_id").val($("#PurchaseOrderMedicines_itm_pkg_id_" + key).val()).change();
        });
        $('#medicine_form').modal('show');
    }

    function delete_row(key) {
        var con = confirm("<?php echo Myclass::t('APP217'); ?>");
        if (con){
            $("#med_tr_" + key).remove();
            $("#medicine_row_" + key).remove();
        }
    }

    function reset_form() {
        $('#medicine-form')[0].reset();
        $('.med_hidden').val('');
        $('.med_hidden_span').html('');
        $('#medicine_form').modal('hide');
    }
</script>