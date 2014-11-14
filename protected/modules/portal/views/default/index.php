<div class="row">
    <?php  $this->renderPartial('_doctorboard', compact('specialities','conditions','symptoms','specinModel','symModel','condModel')); ?>
    <?php $this->renderPartial('_diagnosticboard', compact('procedures','tests','diagnosticnames')); ?>
</div>