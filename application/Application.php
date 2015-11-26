<?php

class Application
{
    protected $route;
    protected static $config;

    public function __construct()
    {
        $this->route = new Route();
        self::$config = new ConfigManager();
    }

    public static function getParam($key){
        $config = self::$config->getConfig();
        return $config[$key];
    }

    public function merge(Array $config)
    {
        self::$config->merge($config);
    }

    public function route()
    {
        return $this->route;
    }

    public function redirect(Array $route){
        echo '<pre>';
        print_r($route);
        echo '</pre>';
        die();
    }

}