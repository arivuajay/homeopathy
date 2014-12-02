<?php
/* @var $this MedstockController */
/* @var $model MedStock */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'med-stock-form',
        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
	'enableAjaxValidation'=>true,
)); ?>

<?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'tenant',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'tenant',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'tenant'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'stk_med_id',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'stk_med_id',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'stk_med_id'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'stk_pkg_id',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'stk_pkg_id',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'stk_pkg_id'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'stk_batch_no',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'stk_batch_no',array('size'=>60,'maxlength'=>150,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'stk_batch_no'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'stk_avail_units',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'stk_avail_units',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'stk_avail_units'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'stk_debit_units',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'stk_debit_units',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'stk_debit_units'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'check_row',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textArea($model,'check_row',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'check_row'); ?>
        </div>
    </div>
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->