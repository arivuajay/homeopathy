<?php
/* @var $this MedicinesController */
/* @var $model Medicines */
/* @var $form CActiveForm */
?>


<div class="panel-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medicines-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'form-horizontal tasi-form',
        ),

)); ?>

<script type="text/javascript">
$(document).ready(function(){
    $(".addCF").click(function(){
        $( "#hidden_insert_row .form-group" ).clone().appendTo("#package_block");
    });
    
    $("#package_block").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
</script>

<div id="hidden_insert_row" style="display: none">
    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label" style="text-align: right"><?php echo Myclass::t('APP77');?></label>
        <div class="col-sm-3">
            <?php echo $form->textField($package,'pkg_med_unit[]',array('class'=>"form-control",'placeholder'=>'Units'));?>
            <?php echo $form->error($package,'pkg_med_unit');?>
        </div>
        <div class="col-sm-3">
            <?php echo $form->textField($package,'pkg_med_power[]',array('class'=>"form-control",'placeholder'=>'Potency'));?>
            <?php echo $form->error($package,'pkg_med_power');?>
        </div>
        <div class="col-sm-3">
            <a href="javascript:void(0);" class="remCF btn btn-info">Remove</a>
        </div>
    </div>
</div>

    <!--        <div class="form-group">
            <div class="col-sm-12">
            <?php echo $form->errorSummary($model,''); ?>
            </div>
        </div>-->
    
        <?php echo $form->hiddenField($model,'tenant', array('value' => $model->getTenant())); ?>
	
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_id', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php $categories = CHtml::listData(MedCategories::model()->isActive()->isParent()->findAll(),'med_cat_id','med_cat_name');  ?>
                <?php echo $form->dropDownList($model, 'med_cat_id', $categories, array('empty' => Myclass::t('APP61'),'class'=>"form-control"));?>
		<?php echo $form->error($model,'med_cat_id'); ?>
                </div>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_name', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php echo $form->textField($model,'med_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_name'); ?>
                </div>
	</div>
        
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_desc', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php echo $form->textArea($model,'med_desc',array('rows'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_desc'); ?>
                </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'med_status', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                <?php $status = Myclass::getMedicineStatus();?>
                <?php echo $form->radioButtonList($model,'med_status',$status, array('style' => 'display:inline'))?>
		<?php echo $form->error($model,'med_status'); ?>
                </div>
	</div>

        <div class="form-group">
            <div class="col-sm-12">
                <b><?php echo Myclass::t('APP75')?></b>
            </div>
	</div>
        
        <div id="package_block" class="form-group">
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="text-align: right"><?php echo Myclass::t('APP77');?></label>
                <div class="col-sm-3">
                    <?php echo $form->hiddenField($package, 'pkg_med_id', array('value' => '1'));?>
                    <?php echo $form->textField($package,'pkg_med_unit',array('class'=>"form-control",'placeholder'=>'Units')); ?>
                    <?php echo $form->error($package,'pkg_med_unit'); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $form->textField($package,'pkg_med_power',array('class'=>"form-control",'placeholder'=>'Potency')); ?>
                    <?php echo $form->error($package,'pkg_med_power'); ?>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0);" class="addCF btn btn-info">Add</a>
                </div>

            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-12 pull-left">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-info')); ?>
                <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/medicines/'),array('class'=>'btn btn-sm btn-default')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->