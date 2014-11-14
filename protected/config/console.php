<?php
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
   'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
   'name'=>'Altimus Console Application',
    // preloading 'log' component
    'preload'=>array('log'),
        'import'=>array(
                'application.components.*',
                'application.models.*',
        ),
   
   'modules'=>array(
       'admin','client',
    ),
    'components'=>array(
        // uncomment the following to use a MySQL database
        'db' => require_once 'db_config.php',
         'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                                        'logFile'=>'cron.log',
                    'levels'=>'error, warning',
                ),
                                array(
                                        'class'=>'CFileLogRoute',
                                        'logFile'=>'cron_trace.log',
                                        'levels'=>'trace',
                                ),
            ),
                        
        ),
    ),
     'params' => require(dirname(__FILE__) . '/params.php'),
);
?>