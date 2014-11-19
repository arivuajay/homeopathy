<?php 
//echo CHtml::form(); 
global $app;
$languages = array('en' => 'English', 'es' => 'Espanol');
?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <?php echo CHtml::image("{$app->theme->baseUrl}/img/flags/$currentLang.png"); ?>
    <span class="username"><?php echo $languages[$currentLang]; ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <?php 
                          unset($languages[$currentLang]);
                          foreach($languages as $flag => $lang):
                            echo "<li>";
                            echo CHtml::link(CHtml::image("{$app->theme->baseUrl}/img/flags/$flag.png")." ".$lang,'#');
                          endforeach; ?>
                      </ul>
<?php // echo CHtml::endForm(); ?>