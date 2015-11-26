<?php

class Model extends Database{

    public function __construct(){
        return parent::__construct();
    }

    public static function model(){
        return new Model();
    }

}