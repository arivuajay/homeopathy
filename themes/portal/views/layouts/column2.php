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
        <?php echo $content; ?>
    </section>
</section>
<!--main content end-->
<?php $this->endContent(); ?>