<?php

class Database
{
    private $connection;
    public $result;

    public function __construct()
    {
        $dbconf = Application::getParam('database');
        $this->connection = new PDO("mysql:host={$dbconf['host']};dbname={$dbconf['dbname']}", $dbconf['user'], $dbconf['password']);
        $this->connection->exec('set names utf8');
    }

    public function getConnection()
    {
        return $this->connection;
    }


}