<?php

class Model extends Database
{

    public function __construct()
    {
        return parent::__construct();
    }

    public function save()
    {

        $attributes = get_object_vars($this);
        
        $resultArray = array();

        foreach($this->attributes() as $key){
            $resultArray[$key] = $attributes[$key];
        }
        
        $resultArray = array_map(function($item){
            $item = is_string($item) ? "'" . $item . "'" : $item;
            if(!empty($item)) return $item;
        }, $resultArray);


        $sql = "INSERT INTO " . strtolower(get_called_class()) . " (" . implode(', ', array_keys($resultArray)) . ") VALUES(" . implode(', ', array_values($resultArray)) . ")";

        $this->getConnection()->query($sql);

        return $this->getConnection()->lastInsertId();
    }


    public function update($id)
    {

        $attributes = get_object_vars($this);

        $resultArray = array();

        foreach($this->attributes() as $key){
            $resultArray[$key] = $attributes[$key];
        }

        $resultArray = array_map(function($item){
            $item = is_string($item) ? "'" . $item . "'" : $item;
            if(!empty($item)) return $item;
        }, $resultArray);


        $updateSql = array();
        foreach($resultArray as $k => $v){
            if(!empty($v))
                $updateSql[] = "{$k} = {$v}";
        }
        


        $sql = "UPDATE " . strtolower(get_called_class()) ." SET " . implode(', ', $updateSql) . " WHERE  id = {$id}";

        $this->getConnection()->query($sql);

    }

    public function query($sql){
        $this->getConnection()->query($sql);
    }



    public function findBySql($sql)
    {
        return $this->getConnection()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function findOneBySql($sql)
    {
        return $this->getConnection()->query($sql)->fetch(PDO::FETCH_OBJ);
    }

    public static function model()
    {
        $class = get_called_class();
        return new $class();
    }

    public function uploadImage($file)
    {

        if (!isset($file['error']) || $file['error']['image'] === 0) {
            preg_match('/image\/(\w+)/s', $file['type']['image'], $ext);
            $uploadPath = Application::getParam('uploadPath') . "/" . strtolower(get_called_class()) . "/";
            $file_name = time() . ".{$ext[1]}";
            $target_file = $uploadPath . $file_name;

            if (!move_uploaded_file($file["tmp_name"]["image"], $target_file)) {
                //TODO: Will do exception
                die("File is not uploaded");
            }

            return $file_name;
        }


    }



}