<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Homeopathy',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        'superadmin', 'site', 'portal',
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'test123',
            'generatorPaths' => array('bootstrap.gii'),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//code.jquery.com/',
                    'js' => array('jquery-1.10.1.min.js', 'jquery-migrate-1.2.1.min.js'),
                ),
            )
        ),
        'user' => array('allowAutoLogin' => true),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => require(dirname(__FILE__) . '/urlManager.php'),
        ),
//        'cache'=>array(
//            'class'=>'system.caching.CMemCache',
//            'servers'=>array(
//                array('host'=>'localhost', 'port'=>11211, 'weight'=>60),
//            ),
//        ),
        'db' => require_once 'db_config.php',
        'errorHandler' => array(
            'errorAction' => 'site/default/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    //setting the basic language value
    'language' => 'en',
    'defaultController' => 'site/default/index',
    'params' => require(dirname(__FILE__) . '/params.php'),
    'timeZone' => 'Asia/Calcutta',
);
