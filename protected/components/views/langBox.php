<?php
global $app;
?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <?php echo CHtml::image("{$app->theme->baseUrl}/img/flags/$currentLang.png"); ?>
    <span class="username"><?php echo $languages[$currentLang]; ?></span>
    <b class="caret"></b>
</a>
<ul class="dropdown-menu">
    <?php
    unset($languages[$currentLang]);
    foreach ($languages as $flag => $lang):
        echo "<li>";
    echo CHtml::ajaxLink(CHtml::image("{$app->theme->baseUrl}/img/flags/$flag.png") . " " . $lang,'',
                        array(
                            'type'=>'post',
                            'data'=>'_lang='.$flag.'&YII_CSRF_TOKEN='.Yii::app()->request->csrfToken,
                            'beforeSend' => 'function(data) {$("#lang_'.$flag.'").append("&nbsp; <i class=\"fa fa-refresh fa-spin\"></i>");}',
                            'success' => 'function(data) {window.location.reload();}'
                        ),
                        array('id'=>"lang_$flag")
                    );
    endforeach;
    ?>
</ul>
