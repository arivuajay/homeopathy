<div class="panel-body">
                             
                              <?php $form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>true,
));


 echo $form->errorSummary(array($model,$profModel)); ?>
                                 
                                  <div class="form-group">
										<?php echo $form->labelEx($model,'ur_username'); ?>
                                         <?php echo $form->textField($model,'ur_username',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                                         <?php echo $form->error($model,'ur_username'); ?>
                                  </div>                                
                                  
                                  <div class="form-group">
                                      <?php echo $form->labelEx($model,'ur_password'); ?>
                                         <?php echo $form->passwordField($model,'ur_password',array('size'=>60,'maxlength'=>255 ,'class' => 'form-control','type' => 'form-control')); ?>
										 <?php echo $form->error($model,'ur_password'); ?>
                                  </div>
                                  
<div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_firstname'); ?>
        <?php echo $form->textField($profModel,'doc_firstname',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_firstname'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_lastname'); ?>
        <?php echo $form->textField($profModel,'doc_lastname',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_lastname'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_dob'); ?>
        <?php echo $form->textField($profModel,'doc_dob',array('class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_dob'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_speciality'); ?>
        <?php echo $form->textField($profModel,'doc_speciality',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_speciality'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_certificate'); ?>
        <?php echo $form->textArea($profModel,'doc_certificate',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_certificate'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_designated'); ?>
        <?php echo $form->textField($profModel,'doc_designated',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_designated'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_awards'); ?>
        <?php echo $form->textArea($profModel,'doc_awards',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_awards'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_about'); ?>
        <?php echo $form->textArea($profModel,'doc_about',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_about'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_address_1'); ?>
        <?php echo $form->textArea($profModel,'doc_address_1',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_address_1'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_address_2'); ?>
        <?php echo $form->textArea($profModel,'doc_address_2',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_address_2'); ?>
            </div>
    


 
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_country'); ?>
        <?php echo $form->dropDownList($profModel,'doc_country',CHtml::listData(Countries::model()->isActive()->findAll(),'id','country'),array('class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_country'); ?>
            </div>
        

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_state'); ?>
        <?php echo $form->dropDownList($profModel,'doc_state',CHtml::listData(States::model()->isActive()->findAll(),'id','state'),array('class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_state'); ?>
            </div>
    
    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_city'); ?>
        <?php echo $form->dropDownList($profModel,'doc_city',CHtml::listData(Cities::model()->isActive()->findAll(),'id','city'),array('class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_city'); ?>
            </div>
   

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_phone'); ?>
        <?php echo $form->textField($profModel,'doc_phone',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_phone'); ?>
            </div>
    

    
            <div class="form-group">
        <?php echo $form->labelEx($profModel,'doc_mobile_no'); ?>
        <?php echo $form->textField($profModel,'doc_mobile_no',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
        <?php echo $form->error($profModel,'doc_mobile_no'); ?>
            </div>                                
                                                                    
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>


<?php $this->endWidget(); ?>
                          </div>