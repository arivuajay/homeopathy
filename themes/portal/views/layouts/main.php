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
        $cs->registerCssFile($themeUrl . '/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css');
        $cs->registerCssFile($themeUrl . '/css/owl.carousel.css');
        $cs->registerCssFile($themeUrl . '/css/style.css');
        $cs->registerCssFile($themeUrl . '/css/style-responsive.css');
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo $themeUrl; ?>/js/html5shiv.js"></script>
          <script src="<?php echo $themeUrl; ?>js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <?php echo $this->renderPartial('//layouts/_header'); ?>
            <!--header end-->
            <?php echo $content; ?>
            <!--footer start-->
            <?php echo $this->renderPartial('//layouts/_footer'); ?>      
            <!--footer end-->
        </section>
        <?php
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($themeUrl . '/js/bootstrap.min.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.dcjqaccordion.2.7.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.scrollTo.min.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.nicescroll.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.sparkline.js');

        $cs->registerScriptFile($themeUrl . '/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js');
        $cs->registerScriptFile($themeUrl . '/js/owl.carousel.js');
        $cs->registerScriptFile($themeUrl . '/js/jquery.customSelect.min.js');
        $cs->registerScriptFile($themeUrl . '/js/respond.min.js');

        $cs->registerScriptFile($themeUrl . '/js/common-scripts.js');
        $cs->registerScriptFile($themeUrl . '/js/sparkline-chart.js');
        $cs->registerScriptFile($themeUrl . '/js/easy-pie-chart.js');
        $cs->registerScriptFile($themeUrl . '/js/count.js');

        $cs->registerScript(
                'Init', ' $(".alert-notify").animate({opacity: 1.0}, 3000).fadeOut("slow");
                    $(".alert-close").click(function(){ $(this).closest(".alert-notify").hide(); });
                    $(document).ready(function() {
                        $("#owl-demo").owlCarousel({
                            navigation : true,
                            slideSpeed : 300,
                            paginationSpeed : 400,
                            singleItem : true,
                                        autoPlay:true

                        });
                    });
                    $(function(){
                        $("select.styled").customSelect();
                    });
                '
                , CClientScript::POS_READY
        );
        ?>
    </body>
</html>
