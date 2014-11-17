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
                        <th class="hidden-phone"><?php echo Myclass::t('APP102') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($model)): foreach ($model as $k => $data): ?>
                        <tr>
                            <td><?php echo $k+1; ?></td>
                            <td><?php echo CHtml::encode($data->med_cat_name); ?></td>
                            <td><?php echo CHtml::encode($data->medparcat->med_cat_name); ?></td>
                            <td><?php echo Myclass::getMedicineUnit($data->med_cat_unit); ?></td>
                            <td class="hidden-phone"><?php echo CHtml::encode($data->med_cat_desc); ?></td>
                            <td class="center hidden-phone">X</td>
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
                        <th class="hidden-phone"><?php echo Myclass::t('APP102') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

