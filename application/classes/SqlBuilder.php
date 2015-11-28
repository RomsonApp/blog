<?php

class SqlBuilder extends Database
{
    private $select = "SELECT *";
    private $from;
    private $table;
    private $where;
    private $relation = '';
    private $order = '';
    private $limit = '';
    private $fetchAll = true;
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
        $rel = current($relation);
        $table = key($relation);
        $name = $rel[0];
        $field = $rel[1];
        $index = $rel[2];

        $this->relation .= ", (SELECT {$field} FROM {$table} WHERE {$index} = {$this->table}.id) as {$name}";
        return $this;
    }

    public function orderBy($orderBy)
    {
        $this->order = " ORDER BY {$this->table}.id $orderBy";
        return $this;
    }

    public function limit($limit)
    {
        if($limit == 1){
            $this->fetchAll = false;
        }
        $this->limit = " LIMIT $limit";
        return $this;
    }


    public function query()
    {
        $this->query = $this->select . $this->relation . $this->from . $this->where . $this->order . $this->limit;
        if ($this->fetchAll) {
            return $this->getConnection()->query($this->query)->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $this->getConnection()->query($this->query)->fetch(PDO::FETCH_OBJ);

        }


    }
}