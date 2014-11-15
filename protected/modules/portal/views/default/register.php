<div class="col-lg-12 col-md-12  col-sm-12 main  clearfix">
    <div class="col-lg-8 col-md-10 col-sm-11 center-block fn block-bg">
        
        <h1 class="back-green">Patient Register</h1>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'register-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
        ));
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'first_name', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($model, 'first_name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'first_name'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'last_name', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($model, 'last_name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'gender', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->radioButtonList($model, 'gender', Myclass::getGender(), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;')); ?>
                <?php echo $form->error($model, 'gender'); ?>
            </div>
        </div>        

        <div class="form-group">
            <?php echo $form->labelEx($usermodel, 'useremail', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($usermodel, 'useremail', array('class' => 'form-control')); ?>
                <?php echo $form->error($usermodel, 'useremail'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($usermodel, 'mobile_number', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($usermodel, 'mobile_number', array('class' => 'form-control')); ?>
                <?php echo $form->error($usermodel, 'mobile_number'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($usermodel, 'password', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->passwordField($usermodel, 'password', array('class' => 'form-control')); ?>
                <?php echo $form->error($usermodel, 'password'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($usermodel, 'confirmpass', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->passwordField($usermodel, 'confirmpass', array('class' => 'form-control')); ?>
                <?php echo $form->error($usermodel, 'confirmpass'); ?>
            </div>
        </div>
         <div class="form-group">
            <?php echo $form->labelEx($model, 'zipcode', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php echo $form->textField($model, 'zipcode', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'zipcode'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'state', array('class' => 'col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php
                $states = CHtml::listData(States::model()->findAll(), 'stateID', 'stateName');
                echo $form->dropDownList($model, 'state', $states, array('empty' => 'Select State', 'class' => 'form-control', 'id' => 'state_dropDown'));
                ?>
                <?php echo $form->error($model, 'state'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'city', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php
                echo $form->dropDownList($model, 'city', array(), array('empty' => 'Select Your City', 'class' => 'form-control', 'id' => 'city_dropDown'));
                echo $form->error($model, 'city');
                ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'locality', array('class' => ' col-lg-3 col-md-3  col-sm-3 control-label')); ?>
            <div class="col-lg-7 col-md-7  col-sm-7">
                <?php
                echo $form->dropDownList($model, 'locality', array(), array('empty' => 'Select Your Location', 'class' => 'form-control', 'id' => 'locality_dropDown'));
                echo $form->error($model, 'locality');
                ?>
            </div>
        </div>        

        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7  col-sm-7">
                <?php echo CHtml::submitButton('sign up', array('class' => 'btn btn-blue pull-right')); ?>
            </div>
        </div>
    <div class="social-login clearfix">
        <button data-provider="facebook" class=" btn btn-lg facebook-login-btn oAuthLogin"><i class="fa fa-facebook"></i>Sign In with Facebook</button>
        <button data-provider="google"  class=" btn btn-lg google-login-btn oAuthLogin"><i class="fa fa-linkedin"></i>Sign In with Google</button>        
        <button data-provider="twitter"  class=" btn btn-lg twitter-login-btn pull-right oAuthLogin"><i class="fa fa-twitter"></i>Sign In with Twitter</button>
    </div>
        
        <?php $this->endWidget(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#state_dropDown").change(function() {
            _val = $(this).val();
            $.ajax({
                method: 'get',
                dataType: 'json',
                url: '<?php echo $this->createUrl('/site/default/citylist'); ?>',
                data: {id: _val},
                success: function(response) {
                    var htmlList = '<option value="">Select Your City</option>';
                    $.each(response, function(key, item) {
                        htmlList += '<option value=' + key + '>' + item + '</option>';
                    });
                    $('#city_dropDown').html(htmlList);
                }
            });
        });
        $("#city_dropDown").change(function() {
            _val = $(this).val();
            $.ajax({
                method: 'get',
                dataType: 'json',
                url: '<?php echo $this->createUrl('/site/default/localitylist'); ?>',
                data: {id: _val},
                success: function(response) {
                    var htmlList = '<option value="">Select Your Location</option>';
                    $.each(response, function(key, item) {
                        htmlList += '<option value=' + key + '>' + item + '</option>';
                    });
                    $('#locality_dropDown').html(htmlList);
                }
            });
        });
    });

    $('.oAuthLogin').click(function(e) {
        var _frameUrl = "<?php echo Yii::app()->createAbsoluteUrl('/site/default/signupsocial'); ?>?provider=" + $(this).data('provider');
        window.open(_frameUrl, "SignIn", "width=580,height=410,toolbar=0,scrollbars=0,status=0,resizable=0,location=0,menuBar=0,left=400,top=150");
        e.preventDefault();
        return false;
    });
</script>