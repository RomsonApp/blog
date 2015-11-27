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

    public static function redirect(Array $route){
        header("Location: " . self::createUrl($route));
    }
    
    public static function createUrl(Array $url){
        return "/" . self::getParam('basePath') . "/index.php?page=" . key($url) . "&action=" . current($url);
    }

}