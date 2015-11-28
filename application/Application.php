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

    public static function redirect(Array $route, Array $argv = array()){
        header("Location: " . self::createUrl($route, $argv));
    }
    
    public static function createUrl(Array $url, Array $argv = array()){
        $params = '';
        if(!empty($argv)){
            foreach($argv as $k => $v){
                $params .= "&{$k}={$v}";
            }
        }
        return 'http://' . self::getParam('server') . self::getParam('basePath') . "index.php?page=" . key($url) . "&action=" . current($url) . $params;
    }

}