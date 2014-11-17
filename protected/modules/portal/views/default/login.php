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
<h2 class="form-signin-heading"><?php echo Myclass::t('APP1'); ?></h2>
<div class="login-wrap">
    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'autocomplete' => 'off', 'autofocus', 'placeholder' => $model->getAttributeLabel('username'))); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $model->getAttributeLabel('password'))); ?>

    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check')); ?><?php echo Myclass::t('APP4'); ?>
        <span class="pull-right">
            <a data-toggle="modal" href="#myModal"><?php echo Myclass::t('APP5'); ?></a>
        </span>
    </label>
    <?php echo CHtml::button('Sign in', array("class" => "btn btn-lg btn-login btn-block", "type" => "submit")); ?>

    <div class="registration">
        <?php echo Myclass::t('APP6'); ?>
        <?php echo CHtml::link(Myclass::t('APP7'), '#'); ?>
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
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo Myclass::t('APP5'); ?></h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <?php echo $form->textField($model, 'username', array("placeholder" => Myclass::t('APP2'), "autocomplete" => "off", "class" => "form-control placeholder-no-fix")); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="modal-footer">
                <?php echo CHtml::htmlButton("<i class='fa fa-arrow-circle-o-left'></i>"."&nbsp;&nbsp;".  Myclass::t('APP8'), array('class' => 'btn btn-primary pull-left', "type" => "button", 'data-dismiss' => "modal")); ?>
                <?php echo CHtml::button(Myclass::t('APP10'), array('class' => 'btn btn-success', "type" => "submit")); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<!-- modal -->


