<?php
/* @var $this MedicinepkgController */
/* @var $model MedicinePkg */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medicine-pkg-form',
        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
	'enableAjaxValidation'=>true,
)); ?>

<?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'pkg_med_id',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pkg_med_id',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'pkg_med_id'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pkg_med_unit',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pkg_med_unit',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pkg_med_unit'); ?>
        </div>
    </div>
        <div class="form-group">
        <?php echo $form->labelEx($model,'pkg_med_power',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
        <div class="col-lg-10">
                    <?php echo $form->textField($model,'pkg_med_power',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'pkg_med_power'); ?>
        </div>
    </div>
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
<!-- form -->