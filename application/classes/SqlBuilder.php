<?php

class SqlBuilder extends Database{
    private $select = "SELECT *";
    private $from;
    private $table;
    private $where;
    private $relation = '';
    private $query;

    public function __construct()
    {
        parent::__construct();
        return $this;
    }

    public function select($fields = array())
    {
        $this->select = "SELECT " . implode(', ', $fields);
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        $this->from = " FROM " . $this->table;
        return $this;
    }

    public function where($where = array(), $and_or = "AND")
    {
        if (!empty($where)) {
            $this->where = " WHERE " . implode(" " . $and_or . " ", $where);
        }

        return $this;
    }

    public function with(Array $relation)
    {

        $this->relation .= ", (SELECT " . current($relation) . " FROM " . key($relation) . " WHERE id = {$this->table}.id) as " . key($relation);
        return $this;
    }


    public function query()
    {
        $this->query = $this->select . $this->relation . $this->from . $this->where;

        return $this->getConnection()->query($this->query)->fetchAll(PDO::FETCH_OBJ);


    }
}