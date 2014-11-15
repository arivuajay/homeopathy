<div class="col-lg-12 col-md-12  col-sm-12 main  clearfix">
    <div class="col-lg-8 col-md-10 col-sm-11 center-block fn block-bg">
        
        <h1 class="back-green">Forgot Password</h1>
    <?php 
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'loginForm',
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('role'=>'form','class'=>'form-horizontal')
    ));
    ?>
    <div class="form-group">
         <?php echo $form->labelEx($model, 'mobile_number', array('class' => 'col-md-3 control-label')); ?>
        <div class="col-lg-7">
            <?php echo $form->textField($model, 'mobile_number', array("id"=>"loginEmail" ,'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mobile_number'); ?>
        </div>
        </div>
    <div class="form-group">
         <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 ">
            <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-blue pull-right')); ?>
        </div>
    </div>
        <p class="login-info">Back to <?php echo CHtml::link('Sign in',array('/site/default/login'));?></p>
        <?php $this->endWidget(); ?>
 </div>
</div>
