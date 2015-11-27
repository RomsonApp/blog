<?php

class Database
{
    private $connection;
    public $result;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=blog-test", 'root', 'jomedia123');
        $this->connection->exec('set names utf-8');
    }

    public function getConnection()
    {
        return $this->connection;
    }


    public function findBySql($sql){
        return $this->getConnection()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function findOneBySql($sql){
        return $this->getConnection()->query($sql)->fetch(PDO::FETCH_OBJ);
    }
}