
<div class="form-group">
    <?php echo CHtml::activeHiddenField($model,"[$index]itm_po_id") ?>
    <div class="col-sm-3">
        <?php echo CHtml::activeLabelEx($model, 'itm_med_id') ?>
        <?php $medicines = CHtml::listData(Medicines::model()->isActive()->findAll(), 'med_id', 'med_name');?>
        <?php echo CHtml::activeDropDownList($model, 'itm_med_id', $medicines, array('class' => 'form-control','empty'=>Myclass::t('APP204'))) ?>
        <?php echo CHtml::error($model, "[$index]itm_med_id"); ?>
    </div>
    
    <div class="col-sm-3">
        <?php echo CHtml::activeLabelEx($model, 'itm_pkg_id') ?>
        <?php echo CHtml::activeDropDownList($model, 'itm_pkg_id', '', array('class' => 'form-control','empty'=>Myclass::t('APP205'))) ?>
        <?php echo CHtml::error($model, "[$index]itm_pkg_id"); ?>
    </div>


    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_batch_no') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_batch_no", array('class' => "form-control", 'placeholder' => Myclass::t('APP201'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_batch_no"); ?>
    </div>
    
    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_manf_date') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_manf_date", array('class' => "form-control default-date-picker", 'placeholder' => Myclass::t('APP202'), 'value'=>'')); ?>
        <?php echo CHtml::error($model, "[$index]itm_manf_date"); ?>
    </div>
    
    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_exp_date') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_exp_date", array('class' => "form-control default-date-picker", 'placeholder' => Myclass::t('APP203'), 'value'=>'')); ?>
        <?php echo CHtml::error($model, "[$index]itm_exp_date"); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_qty') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_qty", array('class' => "form-control", 'placeholder' => Myclass::t('APP206'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_qty"); ?>
    </div>

    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_mrp_price') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_mrp_price", array('class' => "form-control", 'placeholder' => Myclass::t('APP207'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_mrp_price"); ?>
    </div>

    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_vat_tax') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_vat_tax", array('class' => "form-control", 'placeholder' => Myclass::t('APP208'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_vat_tax"); ?>
    </div>

    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_discount') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_discount", array('class' => "form-control", 'placeholder' => Myclass::t('APP209'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_discount"); ?>
    </div>

    <div class="col-sm-2">
        <?php echo CHtml::activeLabelEx($model, 'itm_net_rate') ?>
        <?php echo CHtml::activeTextField($model, "[$index]itm_net_rate", array('class' => "form-control", 'placeholder' => Myclass::t('APP210'))); ?>
        <?php echo CHtml::error($model, "[$index]itm_net_rate"); ?>
    </div>
    
    <div class="col-sm-2">
        <br>
        <?php echo CHtml::link(Myclass::t('APP81'), "javascript:void(0)", array('class' => 'btn btn-danger tabular-input-remove')) ?>
    </div>

</div>