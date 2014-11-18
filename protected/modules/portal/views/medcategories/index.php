<?php
/* @var $this MedcategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Med Categories',
);

?>

<section class="panel">
    <header class="panel-heading">
        <?php 
        echo Myclass::t('APP57');
        echo CHtml::link('<i class="fa fa-plus-square"></i> &nbsp;'.Myclass::t('APP59'),array('/portal/medcategories/create'),array('class'=>'btn btn-sm btn-success pull-right'));
        ?>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table  class="display datatable table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?php echo Myclass::t('APP60') ?></th>
                        <th><?php echo Myclass::t('APP51') ?></th>
                        <th><?php echo Myclass::t('APP52') ?></th>
                        <th><?php echo Myclass::t('APP53') ?></th>
                        <th class="hidden-phone"><?php echo Myclass::t('APP54') ?></th>
                        <th><?php echo Myclass::t('APP55') ?></th>
                        <th class="text-center"><?php echo Myclass::t('APP102') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($model)): foreach ($model as $k => $data): ?>
                        <tr>
                            <td><?php echo $k+1; ?></td>
                            <td><?php echo CHtml::encode($data->med_cat_name); ?></td>
                            <td><b><?php echo CHtml::encode($data->medparcat->med_cat_name); ?></b</td>
                            <td><?php echo Myclass::getMedicineUnit($data->med_cat_unit); ?></td>
                            <td class="hidden-phone"><?php echo CHtml::encode($data->med_cat_desc); ?></td>
                            <td>
                                <?php 
                                if($data->med_cat_status == '1'){
                                    $s_label = 'success';
                                }else if($data->med_cat_status == '0'){
                                    $s_label = 'danger';
                                }else if($data->med_cat_status == '2'){
                                    $s_label = 'info';
                                }
                                ?>
                                <span class="label label-<?php echo $s_label;?> label-mini"><?php echo Myclass::getMedicineStatus($data->med_cat_status) ?></span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success btn-xs" title="<?php echo Myclass::t('APP67') ?>" onclick="location.href='<?php echo Yii::app()->getBaseUrl();?>/portal/medcategories/view/id/<?php echo $data->med_cat_id;?>'"><i class="fa fa-book"></i></button>
                                <button class="btn btn-primary btn-xs" title="<?php echo Myclass::t('APP65') ?>" onclick="location.href='<?php echo Yii::app()->getBaseUrl();?>/portal/medcategories/update/id/<?php echo $data->med_cat_id;?>'"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs" title="<?php echo Myclass::t('APP66') ?>"><i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>
                    <?php endforeach; else:
                        echo "<tr><td colspan='5'><p align='center'>".  Myclass::t('APP58')."</p></td></tr>";
                    endif;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>&nbsp;</th>
                        <th><?php echo Myclass::t('APP51') ?></th>
                        <th><?php echo Myclass::t('APP52') ?></th>
                        <th><?php echo Myclass::t('APP53') ?></th>
                        <th class="hidden-phone"><?php echo Myclass::t('APP54') ?></th>
                        <th><?php echo Myclass::t('APP102') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

