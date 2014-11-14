<div class="col-lg-12 col-md-12  col-sm-12 main  clearfix">
    <div class="col-lg-9 col-md-10 col-sm-11">
        
        <h1 class="back-green">Sign In</h1>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'loginForm',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
        ));
        if (isset(Yii::app()->request->cookies['altimus_app_username']->value)) {
            $model->username = Yii::app()->request->cookies['altimus_app_username']->value;
            $model->rememberMe = 1;
        }
        ?>       
        <div class="form-group">
            <?php echo $form->labelEx($model, 'username', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $model->getAttributeLabel('Email Id'))); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'password', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $model->getAttributeLabel('password'))); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
        </div>
		
		<div class="form-group">
            <?php  echo $form->labelEx($model, '', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
               <div class="checkbox">
				<div class="pull-left">
					<?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check')); ?>
					<label for="check">Remember me</label>
				</div>
				<div class="pull-right">
					<?php echo CHtml::link(Yii::t('user', 'Forgot Password <span class="green_col">?</span>'), array('/site/default/forgotpassword')); ?>
				</div>
			</div>
            </div>
        </div>
		
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7  col-sm-7">
                <?php echo CHtml::submitButton('sign in', array('class' => 'btn btn-blue pull-right')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>