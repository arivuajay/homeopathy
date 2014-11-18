<?php
/* @var $this MedicinesController */
/* @var $model Medicines */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
$(document).ready(function(){
     $("#insert-more").click(function () {
        $("#mytable").each(function () {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function () {
                tds += '<td>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
        return false;
    });
    
    $('.delete_row').click(function(){
    alert('uu');
/*        console.log('delete');
        var $tr = $(this).closest('tr');
        $tr.remove();
*/        return false;
    });
}); 
</script>

<div class="panel-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medicines-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
            'class'=>'form-horizontal tasi-form',
        ),

)); ?>
        <div class="form-group">
            <div class="col-sm-12">
            <?php echo $form->errorSummary($model,''); ?>
            </div>
        </div>
    
        <?php echo $form->hiddenField($model,'tenant', array('value' => $model->getTenant())); ?>
	
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_cat_id', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php $categories = CHtml::listData(MedCategories::model()->isActive()->isParent()->findAll(),'med_cat_id','med_cat_name');  ?>
                <?php echo $form->dropDownList($model, 'med_cat_id', $categories, array('empty' => Myclass::t('APP61'),'class'=>"form-control"));?>
		<?php echo $form->error($model,'med_cat_id'); ?>
                </div>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_name', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php echo $form->textField($model,'med_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_name'); ?>
                </div>
	</div>
        
        <div class="form-group">
		<?php echo $form->labelEx($model,'med_desc', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-6">
		<?php echo $form->textArea($model,'med_desc',array('rows'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'med_desc'); ?>
                </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'med_status', array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                <?php $status = Myclass::getMedicineStatus();?>
                <?php echo $form->radioButtonList($model,'med_status',$status, array('style' => 'display:inline'))?>
		<?php echo $form->error($model,'med_status'); ?>
                </div>
	</div>
    
     <a href="#" id="insert-more"> Add New Row </a>

    <br>
<table id="mytable">
    <thead>
        <th>Col 1</th>
        <th>Col 2</th>
        <th>Col 3</th>
        <th>Col 4</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <select name="code">
                    <option value="1">javascript</option>
                    <option value="2">PHP mysql</option>
                </select>
            </td>
            <td>
                <input type="text" id="fee-1" class="fee" name="js-fee">
            </td>
            <td>
                <input type="text" id="fee-2" class="fee" name="php-fee">
            </td>
            <td><a href="#" class="delete_row">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
        
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-info')); ?>
        <?php echo CHtml::link(Myclass::t('APP64'),array('/portal/medicines/'),array('class'=>'btn btn-sm btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->