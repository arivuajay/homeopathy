<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'loginForm',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-signin', 'role' => 'form')
        ));
if (isset(Yii::app()->request->cookies['altimus_app_username']->value)) {
    $model->username = Yii::app()->request->cookies['altimus_app_username']->value;
    $model->rememberMe = 1;
}
?>    
<h2 class="form-signin-heading">sign in now</h2>
<div class="login-wrap">
    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'autocomplete' => 'off', 'autofocus', 'placeholder' => $model->getAttributeLabel('username'))); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $model->getAttributeLabel('password'))); ?>

    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check')); ?> Remember me
        <span class="pull-right">
            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
        </span>
    </label>
    <?php echo CHtml::button('Sign in', array("class" => "btn btn-lg btn-login btn-block", "type" => "submit")); ?>

    <div class="registration">
        Don't have an account yet?
        <?php echo CHtml::link('Create an account', '#'); ?>
    </div>
</div>
<?php $this->endWidget(); ?>



<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'forgotForm',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('role' => 'form')
            ));
            $model->setScenario('forgotpassword');
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <?php echo $form->textField($model, 'username', array("placeholder" => "Username", "autocomplete" => "off", "class" => "form-control placeholder-no-fix")); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="modal-footer">
                <p class="login-info">Back to <?php echo CHtml::link('Sign in', array('/site/default/login')); ?></p>

                <?php echo CHtml::button('Cancel', array('class' => 'btn btn-default', "type" => "button", 'data-dismiss' => "modal")); ?>
                <?php echo CHtml::button('Submit', array('class' => 'btn btn-success', "type" => "submit")); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<!-- modal -->


