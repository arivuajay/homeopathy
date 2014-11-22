
<div class="form-group">
    <?php echo CHtml::activeHiddenField($model,"[$index]itm_po_id") ?>
    <div class="col-sm-3">
        <label style="text-align: right"><?php echo Myclass::t('APP68'); ?></label>
        <?php $medicines = CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name');?>
        <?php echo CHtml::activeDropDownList($model, 'itm_med_id', $medicines, array('class' => 'form-control','empty'=>Myclass::t('APP204'))) ?>
        <?php echo CHtml::error($model, "[$index]itm_med_id"); ?>
    </div>
    
    <div class="col-sm-3">
        <label style="text-align: right"><?php echo Myclass::t('APP77'); ?></label>
        <?php echo CHtml::activeDropDownList($model, 'itm_pkg_id', '', array('class' => 'form-control','empty'=>Myclass::t('APP205'))) ?>
        <?php echo CHtml::error($model, "[$index]itm_pkg_id"); ?>
    </div>


    <div class="col-sm-2">
        <label style="text-align: right"><?php echo Myclass::t('APP201'); ?></label>
        <?php echo CHtml::activeTextField($model, "[$index]itm_batch_no", array('class' => "form-control", 'placeholder' => Myclass::t('APP201'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_batch_no"); ?>
    </div>
    
    <div class="col-sm-2">
        <label style="text-align: right"><?php echo Myclass::t('APP202'); ?></label>
        <?php echo CHtml::activeTextField($model, "[$index]itm_manf_date", array('class' => "form-control default-date-picker", 'placeholder' => Myclass::t('APP202'), 'value'=>'')); ?>
        <?php echo CHtml::error($model, "[$index]itm_manf_date"); ?>
    </div>
    
    <div class="col-sm-2">
        <label style="text-align: right"><?php echo Myclass::t('APP203'); ?></label>
        <?php echo CHtml::activeTextField($model, "[$index]itm_exp_date", array('class' => "form-control default-date-picker", 'placeholder' => Myclass::t('APP203'), 'value'=>'')); ?>
        <?php echo CHtml::error($model, "[$index]itm_exp_date"); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-3">
        <label style="text-align: right"><?php echo Myclass::t('APP203'); ?></label>
        <?php echo CHtml::activeTextField($model, "[$index]itm_qty", array('class' => "form-control", 'placeholder' => Myclass::t('APP203'), 'value'=>'')); ?>
        <?php echo CHtml::error($model, "[$index]itm_exp_date"); ?>
    </div>
    
    <div class="col-sm-3">
        <?php //echo CHtml::link(Myclass::t('APP81'), "javascript:void(0)", array('class' => 'btn btn-danger tabular-input-remove')) ?>
    </div>

</div>