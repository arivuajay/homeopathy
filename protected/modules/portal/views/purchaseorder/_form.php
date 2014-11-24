<?php
/* @var $this PurchaseorderController */
/* @var $model PurchaseOrder */
/* @var $form CActiveForm */
?>

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
        <?php echo $form->textField($model, 'po_date', array('class' => 'form-control form-control-inline input-medium default-date-picker')); ?>
        <?php echo $form->error($model, 'po_date', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_vendor', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php $vendors = CHtml::listData(Vendors::model()->isActive()->findAll(), 'ven_id', 'ven_name') ?>        
        <?php echo $form->dropDownList($model, 'po_vendor', $vendors, array('empty' => Myclass::t('APP61'), 'class' => "form-control")) ?>
        <?php echo $form->error($model, 'po_vendor', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_invoice', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php echo $form->textField($model, 'po_invoice', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'po_invoice', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<!--<div class="form-group col-lg-6">
<?php echo $form->labelEx($model, 'po_memo', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
<?php echo $form->textArea($model, 'po_memo', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'po_memo', array('class' => 'col-lg-12')); ?>
    </div>
</div>-->
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_total', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php echo $form->textField($model, 'po_total', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'po_total', array('class' => 'col-lg-12')); ?>
    </div>
</div>
<div class="form-group col-lg-6">
    <?php echo $form->labelEx($model, 'po_paid', array('class' => 'col-lg-4 col-sm-2 control-label')); ?>
    <div class="col-lg-8">
        <?php echo $form->textField($model, 'po_paid', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
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
<div class="form-group col-lg-12">
    <?php echo $form->labelEx($model, 'po_memo', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
        <?php echo $form->textArea($model, 'po_memo', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'po_memo', array('class' => 'col-lg-12')); ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-12">
        <?php echo CHtml::link('<i class="fa fa-plus-square"></i>&nbsp' . Myclass::t('APP213'), '#medicine_form', array('class' => 'btn btn-sm btn-success pull-left', 'data-toggle' => "modal")) ?>
    </div>
</div>

<?php
//    $this->widget('ext.widgets.tabularinput.XTabularInput',array(
//        'models'=>$purchase_medicines,
//        'header'=> false,
//        'inputContainerCssClass' => 'col-sm-12',
//        'containerCssClass' => 'form-group', 
//        'inputView'=>'_purchase_medicine_form',
//        'inputUrl'=>$this->createUrl('/portal/purchaseorder/add_medicine_entry'),
//        'addTemplate'=>'<div class="col-sm-4">{link}</div>',
//        'addLabel'=>Yii::t('ui','Add new row'),
//        'addHtmlOptions'=>array('class'=>'btn btn-warning'),
//        'removeTemplate'=>'',
//        'removeLabel'=>'',
//    ));
?>

<table class="table table-striped table-advance table-hover" id="medicines_list">
    <thead>
        <tr>
            <th><i class="fa fa-medkit"></i> <?php echo Myclass::t('APP215'); ?></th>
            <th><i class="fa fa-bullhorn"></i> <?php echo Myclass::t('APP206'); ?></th>
            <th><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP207'); ?></th>
            <th><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP208'); ?></th>
            <th><i class=" fa fa-rupee hidden-phone"></i> <?php echo Myclass::t('APP209'); ?></th>
            <th><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP210'); ?></th>
            <th><i class=" fa fa-rupee"></i> <?php echo Myclass::t('APP211'); ?></th>
        </tr>
    </thead>
    <tbody>
        
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
                                    ),
//                                'action' => array('/portal/purchaseorder/medicineadd'),
                                'enableAjaxValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    'afterValidate'=>'js:submiAjaxForm'
                                )
                            ));
                            ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_med_id'); ?>
                                    <?php $medicines = CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name'); ?>
                                    <?php echo $form2->dropDownList($purchase_medicines, 'itm_med_id', $medicines, 
                                            array( 
                                                'class' => "form-control",
                                                'prompt'=>Myclass::t('APP61'),
                                                'ajax' => array(
                                                    'type'=>'GET', 
                                                    'url'=>$this->createUrl('/portal/medicinepkg/loadpackages'),
                                                    'update' => '#package_dd_div',
                                                    'data'=>array('med_id'=>'js:this.value'),
                                                )
                                            )); ?>
                                    <?php echo $form2->error($purchase_medicines, 'itm_med_id', array('class' => 'col-lg-12')); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                    <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_pkg_id'); ?>
                                    <div id="package_dd_div">
                                    <?php echo $form2->dropDownList($purchase_medicines, 'itm_pkg_id', '', array('class' => 'form-control', 'empty' => Myclass::t('APP205'))) ?>
                                    </div>
                                    <?php echo $form2->error($purchase_medicines, "itm_pkg_id"); ?>
                                </div>  
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_batch_no') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_batch_no", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_batch_no"); ?>                            
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_manf_date') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_manf_date", array('class' => "form-control default-date-picker", 'value' => '')); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_manf_date"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_exp_date') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_exp_date", array('class' => "form-control default-date-picker", 'value' => '')); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_exp_date"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_qty') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_qty", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_qty"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_mrp_price') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_mrp_price", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_mrp_price"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_vat_tax') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_vat_tax", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_vat_tax"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_discount') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_discount", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_discount"); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $form2->labelEx($purchase_medicines, 'itm_net_rate') ?>
                                    <?php echo $form2->textField($purchase_medicines, "itm_net_rate", array('class' => "form-control")); ?>
                                    <?php echo $form2->error($purchase_medicines, "itm_net_rate"); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo CHtml::submitButton(Myclass::t('APP82'), array('class' => 'btn btn-info')); ?>
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
    function submiAjaxForm(form, data, hasError){
        if(!hasError)
        {
            alert('yes it is');
        }
    }
</script>


