<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo CHtml::encode(SITENAME . "-" . $this->pageTitle); ?></title>
        <meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>">

        <!-- Mobile Specific Meta's
        ================================================== -->
        <meta name="viewport" content="width=device-width">

        <!-- CSS
        ================================================== -->
        <?php
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($themeUrl . '/css/bootstrap.css');
        $cs->registerCssFile($themeUrl . '/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/css/main.css');
        $cs->registerCssFile($themeUrl . '/css/jquery.tagsinput.css');
        $cs->registerCssFile($themeUrl . '/css/lightbox.css');
        $cs->registerCssFile($themeUrl . '/css/jquery.mCustomScrollbar.css');


        //Modernizer
        $cs->registerScriptFile($themeUrl . '/js/modernizr-2.6.2-respond-1.1.0.min.js', CClientScript::POS_HEAD);
        ?>
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo $themeUrl; ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo $themeUrl; ?>/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themeUrl; ?>/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themeUrl; ?>/images/apple-touch-icon-114x114.png">

        <!--[if IE]>
                <link rel="stylesheet" type="text/css" href="<?php echo $themeUrl; ?>/css/all-ie-only.css" />
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <?php echo $content; ?>

        <?php
        $cs->registerScriptFile($themeUrl . '/js/bootstrap.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.backstretch.min.js');

        if ($this->loadDatatable) {
            $cs->registerScriptFile($themeUrl . '/js/jquery.dataTables.js');
            $cs->registerScriptFile($themeUrl . '/js/dataTables.bootstrap.js');
            $cs->registerCssFile($themeUrl . '/css/dataTables.bootstrap.css');
        }

        $cs->registerScriptFile($themeUrl . '/js/jquery.placeholder.js');
        //$cs->registerScriptFile($themeUrl . '/js/jquery.maphilight.min.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.imagemapster.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.mCustomScrollbar.concat.min.js');

        $cs->registerScriptFile($themeUrl . '/js/plugins.js');
        $cs->registerScriptFile($themeUrl . '/js/main.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.tagsinput.js');
        $cs->registerScriptFile($themeUrl . '/js/lightbox-2.6.min.js');

        $cs->registerScript(
                'Init', ' $(".alert-notify").animate({opacity: 1.0}, 3000).fadeOut("slow");
                    $(".alert-close").click(function(){ $(this).closest(".alert-notify").hide(); });
                    $(".info_tool").tooltip();
                '
                , CClientScript::POS_READY
        );
        ?>
    </body>
</html>
