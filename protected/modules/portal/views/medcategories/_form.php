<?php
/* @var $this MedcategoriesController */
/* @var $model MedCategories */
/* @var $form CActiveForm */
?>

<section class="panel">
    <header class="panel-heading"><h3><?php echo Myclass::t('APP56')?></h3></header>

    <div class="panel-body">
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'med-categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
                      'class'=>'form-horizontal tasi-form',
                    ),
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),    
)); ?>
        
        <div class="form-group">
            <div class="col-sm-12">
            <?php echo $form->errorSummary($model,''); ?>
            </div>
        </div>
        
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_parent', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
                <?php $categories = CHtml::listData(MedCategories::model()->isActive()->isParent()->findAll(),'med_cat_id','med_cat_name');  ?>
                <?php echo $form->dropDownList($model, 'med_cat_parent', $categories, array('empty' => Myclass::t('APP61'),'class'=>"form-control"));?>
		<?php echo $form->error($model,'med_cat_parent'); ?>
                </div>
	</div>
        
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_name', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-10">
		<?php echo $form->textField($model,'med_cat_name',array('size'=>60,'maxlength'=>100,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_cat_name'); ?>
                </div>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_unit', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-2">
		<?php $units = Myclass::getMedicineUnit();?>
                <?php echo $form->dropDownList($model, 'med_cat_unit', $units, array('class'=>"form-control"));?>
		<?php echo $form->error($model,'med_cat_unit'); ?>
                </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_desc', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-10">
		<?php echo $form->textArea($model,'med_cat_desc',array('form-groups'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_cat_desc'); ?>
                </div>
	</div>
        
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_status', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                <?php echo $form->radioButtonList($model,'med_cat_status',array(1=>'Active',2=>'In-Active'), array('style' => 'display:inline'))?>
		<?php echo $form->error($model,'med_cat_status'); ?>
                </div>
	</div>

	
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-info')); ?>
        
        <?php $this->endWidget(); ?>

    </div>
</section>
