<?php

class Route{
    private $controller;
    private $action;

    public function get($__get){
        if(!isset($__get['page'])) {
            $this->controller = Application::getParam('defaultController') . "Controller";
        }else{
            $this->controller = $__get['page'] . "Controller";
        }
        if(!isset($__get['action'])){
            $this->action = 'index';
        }else{
            $this->action = $__get['action'];
        }
        $class = ucfirst($this->controller);

        $file = __DIR__ . "/../controllers/" . $class . ".php";

        if(file_exists($file)){
            require_once $file;
            $controller = new $class();
            $controller->{$this->action}();
        }else{
            throw new Exception("File not exist!");
        }


    }

}