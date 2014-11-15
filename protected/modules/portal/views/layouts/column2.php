<?php
$this->beginContent('application.modules.site.views.layouts.main');
$this->renderPartial('application.modules.site.views.layouts._header');
$flashMessages = Yii::app()->user->getFlashes();

        if (!empty($flashMessages)):
            echo '<div class="col-lg-5 col-md-7  col-sm-8 center-block fn clearfix mt20 alert-notify">';
            foreach ($flashMessages as $key => $message) {
                echo "<div class='alert alert-$key'>$message <button type='button' class='close alert-close' aria-hidden='true'>&times;</button></div>";
            }
            echo '</div>';
        endif;

?>

<section class="container">
    <div class="col-lg-12 col-md-12  col-sm-12 main-content clearfix">	
        <?php  echo $content; ?>
    </div>
</section>
<?php
$this->renderPartial('application.modules.site.views.layouts._footer');
 $this->endContent(); ?>