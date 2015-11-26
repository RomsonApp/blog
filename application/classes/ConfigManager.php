<?php

class ConfigManager
{
    private $config = array();
    public function merge($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    public function getConfig(){
        return $this->config;
    }

}