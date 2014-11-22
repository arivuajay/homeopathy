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
<?php echo $form->dropDownList($model, 'po_vendor', $vendors, array('empty' => Myclass::t('APP61'), 'class'=>"form-control")) ?>
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
        <h3><?php echo Myclass::t('APP80').'&nbsp'.Myclass::t('APP68');?></h3>
    </div>
</div>

<?php
    $this->widget('ext.widgets.tabularinput.XTabularInput',array(
        'models'=>$purchase_medicines,
        'header'=> false,
        'inputContainerCssClass' => 'col-sm-12',
        'containerCssClass' => 'form-group', 
        'inputView'=>'_purchase_medicine_form',
        'inputUrl'=>$this->createUrl('/portal/purchaseorder/_purchase_medicine_form'),
        'addTemplate'=>'<div class="col-xs-offset-1 col-sm-4">{link}</div>',
        'addLabel'=>Yii::t('ui','Add new row'),
        'addHtmlOptions'=>array('class'=>'btn btn-warning'),
        'removeTemplate'=>'',
        'removeLabel'=>'',
    ));
?>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">
<?php echo CHtml::submitButton($model->isNewRecord ? Myclass::t('APP59') : Myclass::t('APP82'), array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->