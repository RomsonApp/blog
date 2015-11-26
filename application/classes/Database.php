<?php

class Database{
    public $connection;
    public $result;
    private $table;
    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=blog-test", 'root', 'jomedia123');
        $this->connection->exec('set names utf-8');

    }

    public function getConnection()
    {
        return $this->connection;
    }


    public function query($sql){
        return $this->connection->query($sql);
    }

    public function findAll($table){
        $this->result = $this->query("SELECT * FROM $table");
        return $this->fetchAll();
    }

    public function fetchAll(){
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

}