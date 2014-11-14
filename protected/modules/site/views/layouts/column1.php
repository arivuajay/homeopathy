<?php
$this->beginContent('/layouts/main');
echo $this->renderPartial('/layouts/_header');
?>
        <div class="landing-main">
            <div class="container">
                <?php
                $flashMessages = Yii::app()->user->getFlashes();

                if (!empty($flashMessages)):
                    echo '<div class="offset2 span8 center-block fn clearfix mt20 alert-notify">';
                    foreach ($flashMessages as $key => $message) {
                        echo "<div class='alert alert-$key'>$message <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
                    }
                    echo '</div>';
                endif;
                ?>


        <?php echo $content; ?>
            </div>
        </div> <!-- end of container -->
        <?php
        $this->renderPartial('/layouts/_footer');
      ?>
<?php $this->endContent(); ?>