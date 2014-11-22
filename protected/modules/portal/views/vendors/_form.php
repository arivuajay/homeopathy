<?php
/* @var $this VendorsController */
/* @var $model Vendors */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'vendors-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    )
));
?>

<?php //echo $form->errorSummary($model); ?>

    <?php echo $form->hiddenField($model, 'tenant', array('value' => $model->getTenant())) ?>
<div class="form-group">
        <?php echo $form->labelEx($model, 'ven_name', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
<?php echo $form->textField($model, 'ven_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'ven_name'); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $form->labelEx($model, 'ven_address', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
<?php echo $form->textArea($model, 'ven_address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'ven_address'); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $form->labelEx($model, 'ven_phone_no', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
<?php echo $form->textField($model, 'ven_phone_no', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'ven_phone_no'); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $form->labelEx($model, 'ven_email', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
<?php echo $form->textField($model, 'ven_email', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'ven_email'); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $form->labelEx($model, 'ven_status', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
    <div class="col-lg-10">
<?php echo $form->checkBox($model, 'ven_status', array('data-toggle' => 'switch')); ?>
<?php echo $form->error($model, 'ven_status'); ?>
    </div>
</div>

<?php echo $form->hiddenField($model, 'ven_created_by', array('value' => Yii::app()->user->getId())) ?>
<?php echo $form->hiddenField($model, 'ven_created_at', array('value' => date('Y-m-d H:i:s'))) ?>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->