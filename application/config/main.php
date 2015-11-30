<?php
define('ROOT_DIR', __DIR__ . "/../../");
return array(
    'rootDir' => ROOT_DIR,
    'server' => $_SERVER['SERVER_NAME'],
    'basePath' => '/', // '/' - example.com, '/blog/' - example.com/blog
    'defaultController' => "post",

    /*
     * Database configuration
     */
    'database' => array(
        'host' => '',
        'dbname' => '',
        'user' => '',
        'password' => ''
    ),

    'uploadPath' => ROOT_DIR . "uploads",
);