<div class="form-group">
    <?php echo CHtml::activeHiddenField($model,"[$index]pkg_id") ?>
    <label class="col-sm-2 col-sm-2 control-label" style="text-align: right"><?php echo Myclass::t('APP77'); ?></label>
    <div class="col-sm-3">
        <?php echo CHtml::activeTextField($model, "[$index]pkg_med_unit", array('class' => "form-control", 'placeholder' => Myclass::t('APP79'))); ?>
        <?php echo CHtml::error($model, "[$index]pkg_med_unit"); ?>
    </div>
    <div class="col-sm-3">
        <?php echo CHtml::activeTextField($model, "[$index]pkg_med_power", array('class' => "form-control", 'placeholder' => Myclass::t('APP84'))); ?>
        <?php echo CHtml::error($model, "[$index]pkg_med_power"); ?>
    </div>
    <div class="col-sm-3">
        <?php echo CHtml::link(Myclass::t('APP81'), "javascript:void(0)", array('class' => 'btn btn-danger tabular-input-remove')) ?>
    </div>

</div>