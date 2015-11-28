<?php
define('ROOT_DIR', __DIR__ . "/../../");
return array(
    'rootDir' => ROOT_DIR,
    'server' => $_SERVER['SERVER_NAME'],
    'basePath' => '/',
    'defaultController' => "post",

    /*
     * Database configuration
     */
    'database' => array(
        'host' => 'localhost',
        'dbname' => 'blog-test',
        'user' => 'root',
        'password' => 'root'
    ),

    'uploadPath' => ROOT_DIR . "uploads",
);