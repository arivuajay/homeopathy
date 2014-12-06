<?php
$this->breadcrumbs = array(
    Myclass::t('APP14')
);

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> <?php echo Myclass::t('APP14'); ?></header>
            <div class="panel-body">
                <div class="panel-body">
                    
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'users-form',
                        'htmlOptions' => array('role' => 'form','class'=>'form-horizontal'),
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => true,
                        'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                         ),
                    ));
                    ?>

                    <?php //echo $form->errorSummary($model); ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'old_password',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->passwordField($model, 'old_password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'old_password'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'new_password',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'new_password'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'repeat_password',array('class'=>'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->passwordField($model, 'repeat_password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'repeat_password'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?php echo CHtml::submitButton(Myclass::t('APP14'), array('class' => 'btn btn-info')); ?>
                        </div>
                    </div>


                <?php $this->endWidget(); ?>
                </div>
                <!-- form -->
            </div>
        </section>
    </div>
</div>