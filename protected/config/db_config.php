<?php

return array(
    'connectionString' => 'mysql:host=localhost;dbname=homeopathy',
    'schemaCachingDuration' => 3600,
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => 'hme_',
    'attributes' => array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true
    ),);
?>