<?php
/* @var $this DoctorsController */
/* @var $data Users */
?>

                    <?php var_dump( CHtml::encode(DoctorProfile::model()->findAll(),'docinfo_id','doc_firstname'));?>          
                                      <tbody>
                                      <tr class="gradeX">
                                          <td><?php echo ++$index;?></td>
                                          <td><?php echo ''; ?></td>
                                          <td><?php echo CHtml::encode($data->ur_created_at); ?></td>
                                          <td class="text-center">
                                            <button class="btn btn-success btn-xs" title="<?php echo Myclass::t('APP67') ?>" onclick="location.href='<?php echo Yii::app()->getBaseUrl();?>/portal/medcategories/view/id/<?php //echo $data->med_cat_id;?>'"><i class="fa fa-book"></i></button>
                                <button class="btn btn-primary btn-xs" title="<?php echo Myclass::t('APP65') ?>" onclick="location.href='<?php echo Yii::app()->getBaseUrl();?>/portal/medcategories/update/id/<?php //echo $data->med_cat_id;?>'"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" title="<?php echo Myclass::t('APP66') ?>"><i class="fa fa-trash-o "></i></button>
                                          </td>
                                      </tr>
                                     
                                      
                                      </tbody>
                                      
                         
                          
              
              	<?php /*

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ur_id), array('view', 'id'=>$data->ur_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenant')); ?>:</b>
	<?php echo CHtml::encode($data->tenant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_role_id')); ?>:</b>
	<?php echo CHtml::encode($data->ur_role_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_username')); ?>:</b>
	<?php echo CHtml::encode($data->ur_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_password')); ?>:</b>
	<?php echo CHtml::encode($data->ur_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_activation_key')); ?>:</b>
	<?php echo CHtml::encode($data->ur_activation_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_created_at')); ?>:</b>
	<?php echo CHtml::encode($data->ur_created_at); ?>
	<br />





	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_modified_at')); ?>:</b>
	<?php echo CHtml::encode($data->ur_modified_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_last_login')); ?>:</b>
	<?php echo CHtml::encode($data->ur_last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_last_ip')); ?>:</b>
	<?php echo CHtml::encode($data->ur_last_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ur_status')); ?>:</b>
	<?php echo CHtml::encode($data->ur_status); ?>
	<br />

	

</div>*/ ?>
