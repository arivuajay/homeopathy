<?php
/* @var $this DoctorsController */
/* @var $data Users */
?>

                               
                                      <tbody>
                                      <tr class="gradeX">
                                          <td><?php echo ++$index;?></td>
                                          <td><?php echo CHtml::encode($data->ur_username); ?></td>
                                          <td><?php echo CHtml::encode($data->ur_created_at); ?></td>
                                          <td ><a href="#">View</a>/<a href="#">Edit</a>/<a href="#">Delete</a></td>
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