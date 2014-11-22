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

    <!--<div class="form-group">
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
        
        <?php
            $this->widget('ext.widgets.tabularinput.XTabularInput',array(
                'models'=>$package,
                'header'=> false,
                'inputContainerCssClass' => 'col-sm-12',
                'containerCssClass' => 'form-group', 
                'inputView'=>'_package_form',
                'inputUrl'=>$this->createUrl('/portal/medicines/add_package'),
                'addTemplate'=>'<div class="col-xs-offset-1 col-sm-4">{link}</div>',
                'addLabel'=>Yii::t('ui','Add new row'),
                'addHtmlOptions'=>array('class'=>'btn btn-warning'),
                'removeTemplate'=>'',
                'removeLabel'=>'',
            ));
        ?>
    
       <div class="form-group">
            <div class="col-xs-offset-1 col-sm-10">
                <?php echo CHtml::submitButton($model->isNewRecord ? Myclass::t('APP59'): Myclass::t('APP82'), array('class'=>'btn btn-info')); ?>
                <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/medicines/'),array('class'=>'btn btn-sm btn-default')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->