<?php
$this->beginContent('//layouts/main');

$flashMessages = Yii::app()->user->getFlashes();

if (!empty($flashMessages)):
    echo '<div class="col-lg-5 col-md-7  col-sm-8 center-block fn clearfix mt20 alert-notify">';
    foreach ($flashMessages as $key => $message) {
        echo "<div class='alert alert-$key'>$message <button type='button' class='close alert-close' aria-hidden='true'>&times;</button></div>";
    }
    echo '</div>';
endif;
?>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <?php echo $this->renderPartial('//layouts/_sidebar'); ?>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <?php if ( isset( $this->breadcrumbs ) ): ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs',
                    array(
                    'links'	=>$this->breadcrumbs,
                    'tagName'	=>'ul', // container tag
                    'htmlOptions'	=>array('class'=>'breadcrumb'), // no attributes on container
                    'separator'	=>'', // no separator
                    'homeLink'	=>'<li><a href="'.Yii::app()->baseUrl.'/portal"><i class="fa fa-home"></i> Home</a></li>', // home link template
                    'activeLinkTemplate'	=>'<li><a href="{url}">{label}</a></li>', // active link template
                    'inactiveLinkTemplate'	=>'<li class="active">{label}</li>', // in-active link template
                    ));
                    ?><!-- breadcrumbs -->
                </div>
            </div>
        <?php endif ?> 
        
        <?php echo $content; ?>
    </section>
</section>
<!--main content end-->
<?php $this->endContent(); ?>