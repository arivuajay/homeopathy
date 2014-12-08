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
    // Associates a behavior-class with the onBeginRequest event.
    // By placing this within the primary array, it applies to the application as a whole
    'behaviors' => array(
        'onBeginRequest' => array(
            'class' => 'application.components.behaviors.BeginRequest'
        ),
    ),
    'modules' => array(
        'superadmin', 'site', 'portal',
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'test123',
            'generatorPaths' => array('application.gii'),
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
        'request' => array(
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'loginUrl'=>array('/portal/default/login')
        ),
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
            'errorAction' => '/portal/default/error',
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
    'localeDataPath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../i18n/data',
    //setting the basic language value
    'defaultController' => 'portal/default/login',
    'params' => require(dirname(__FILE__) . '/params.php'),
    'timeZone' => 'Asia/Calcutta',
    'theme' => 'portal',
    'sourceLanguage' => 'en',
    'language' => 'en_US',
);
