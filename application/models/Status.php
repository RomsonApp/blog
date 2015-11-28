<?php

class Status extends Model{
    public $id;
    public $label;

    public function attributes(){
        return array(
            'label'
        );
    }

    public function getAllStatus(){
        return $this->findBySql("SELECT * FROM status");
    }
}