<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">
        <title><?php echo Yii::app()->name; ?></title>

        <?php
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($themeUrl . '/css/bootstrap.min.css');
        $cs->registerCssFile($themeUrl . '/css/bootstrap-reset.css');
        $cs->registerCssFile($themeUrl . '/assets/font-awesome/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/css/style.css');
        $cs->registerCssFile($themeUrl . '/css/style-responsive.css');
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo $themeUrl; ?>/js/html5shiv.js"></script>
          <script src="<?php echo $themeUrl; ?>js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-body">
        <div class="container">
            <?php echo $content; ?>
        </div>
        <?php
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($themeUrl . '/js/bootstrap.min.js');
        ?>
    </body>
</html>
