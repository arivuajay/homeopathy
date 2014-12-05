<?php
/* @var $this PurchaseordermedicinesController */
/* @var $model PurchaseOrderMedicines */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'purchase-order-medicines-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    )
        ));
?>

        <?php //echo $form->errorSummary($model);  ?>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_med_id', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php $medicines = CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name'); ?>
        <?php echo $form->dropDownList($model, 'itm_med_id', $medicines, array(
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
                'data' => array('med_id' => 'js:this.value', 'model' => 'PurchaseOrderMedicines'),
            )
        ));
        echo $form->error($model, 'itm_med_id'); ?>
    </div>
</div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_pkg_id', array('class' => 'col-lg-5 col-sm-3 control-label')); ?>
    <div class="col-lg-7">
        <div id="package_dd_div">
            <?php
            echo $form->dropDownList($model, 'itm_pkg_id', '', array(
                'class' => 'form-control',
                'empty' => Myclass::t('APP205'),
                'onchange' => 'setPackage()'
            ));
            ?>
        </div>
<?php echo $form->error($model, "itm_pkg_id"); ?>
    </div>  
</div>
<div class="clearfix"></div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_batch_no', array('class' => 'col-lg-4 col-sm-2 control-label')) ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-barcode"></i>
<?php echo $form->textField($model, "itm_batch_no", array('class' => "form-control")); ?>
        </div>
<?php echo $form->error($model, "itm_batch_no"); ?>                            
    </div>
</div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_manf_date', array('class' => 'col-lg-5 col-sm-2 control-label')) ?>
    <div class="col-lg-7">
        <div class="iconic-input right">
            <i class="fa fa-calendar"></i>
            <?php $model->isNewRecord ? $manf_date =  '' : $manf_date =  date('Y-m-d', strtotime($model->itm_manf_date))?>
            <?php echo $form->textField($model, "itm_manf_date", array('class' => "form-control default-date-picker", 'value' => $manf_date)); ?>
        </div>
<?php echo $form->error($model, "itm_manf_date"); ?>
    </div>
</div>
<div class="clearfix"></div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_exp_date', array('class' => 'col-lg-4 col-sm-2 control-label')) ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-calendar"></i>
            <?php $model->isNewRecord ? $exp_date =  '' : $exp_date =  date('Y-m-d', strtotime($model->itm_exp_date))?>
            <?php echo $form->textField($model, "itm_exp_date", array('class' => "form-control default-date-picker", 'value' => $exp_date)); ?>
        </div>
<?php echo $form->error($model, "itm_exp_date"); ?>
    </div>
</div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_qty', array('class' => 'col-lg-5 col-sm-2 control-label')) ?>
    <div class="col-lg-7">
        <div class="iconic-input right">
            <i class="fa fa-list"></i>
<?php echo $form->textField($model, "itm_qty", array('class' => "form-control calc-price", 'placeholder' => '')); ?>
        </div>
<?php echo $form->error($model, "itm_qty"); ?>
    </div>
</div>
<div class="clearfix"></div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_mrp_price', array('class' => 'col-lg-4 col-sm-2 control-label')) ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa fa-rupee"></i>
<?php echo $form->textField($model, "itm_mrp_price", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
        </div>
<?php echo $form->error($model, "itm_mrp_price"); ?>
    </div>
</div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_vat_tax', array('class' => 'col-lg-5 col-sm-2 control-label')) ?>
    <div class="col-lg-7">
        <div class="iconic-input right">
            <i class="fa  fa-plus-square"></i>
<?php echo $form->textField($model, "itm_vat_tax", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
        </div>
<?php echo $form->error($model, "itm_vat_tax"); ?>
    </div>
</div>
<div class="clearfix"></div>

<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'itm_discount', array('class' => 'col-lg-4 col-sm-2 control-label')) ?>
    <div class="col-lg-8">
        <div class="iconic-input right">
            <i class="fa  fa-minus-square"></i>
<?php echo $form->textField($model, "itm_discount", array('class' => "form-control calc-price", 'placeholder' => '0.00')); ?>
        </div>
<?php echo $form->error($model, "itm_discount"); ?>
    </div>
</div>

<div class="form-group col-lg-6">
    <div class="col-lg-8 right">
        <p><?php echo Myclass::t('APP210'); ?> : <i class="fa fa-rupee"></i><span id="net_rate_span" class="med_hidden_span"></span></p>
        <p><?php echo Myclass::t('APP211'); ?> : <i class="fa fa-rupee"></i><b><span id="total_amt_span" class="med_hidden_span"></span></b></p>
    </div>
</div>

<div class="clearfix"></div>

<?php echo $form->hiddenField($model, 'itm_net_rate',array('class' => 'med_hidden')) ?>
<?php echo $form->hiddenField($model, 'itm_total_price',array('class' => 'med_hidden')) ?>

<div class="form-group col-lg-6">
    <div class="col-lg-offset-2 col-lg-10">
<?php echo CHtml::submitButton($model->isNewRecord ?  Myclass::t("APP59"): Myclass::t("APP82"), array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->

<script type="text/javascript">
    $(document).ready(function(){
        <?php  if(!$model->isNewRecord){?>
                $.ajax({
                    type:'GET',
                    data:{med_id: '<?php echo $model->itm_med_id ?>', model: 'PurchaseOrderMedicines'},
                    url:"<?php echo $this->createUrl('/portal/medicinepkg/loadpackages')?>",
                    success:function(ret){
                        $("#package_dd_div").html(ret);
                        $('#PurchaseOrderMedicines_itm_pkg_id').val('<?php echo $model->itm_pkg_id ?>');
                    }
                });
        <?php } ?>
        calc_rate();
        $(".calc-price").focusout(function(){
            calc_rate();
       });
       
    });
    
    function calc_rate(){
        var qty = $('#PurchaseOrderMedicines_itm_qty').val();
            var mrp = $('#PurchaseOrderMedicines_itm_mrp_price').val();
            var disc_perc = $('#PurchaseOrderMedicines_itm_discount').val();
            
            qty.length == 0 ? qty = 0 : '';
            mrp.length == 0 ? mrp = 0 : '';
            disc_perc.length == 0 ? disc_perc = 0 : '';
            
            var valid = ($.isNumeric(qty) && $.isNumeric(mrp) && $.isNumeric(disc_perc));

            if(valid){
                var disc_amt = (mrp * (disc_perc/100));
                var net_rate = (mrp - disc_amt).toFixed(2);
                var total_amt = (net_rate * qty).toFixed(2);
                
                $("#PurchaseOrderMedicines_itm_net_rate").val(net_rate);
                $("#PurchaseOrderMedicines_itm_total_price").val(total_amt);
                
                $("#net_rate_span").html(net_rate);
                $("#total_amt_span").html(total_amt);
            }
    }
</script>