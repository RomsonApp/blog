<?php

class View{

    public function render($view, $data = array()){
        $path = __DIR__ . "/../views/";
        $ext = ".php";

        if(file_exists($path. $view . $ext)){
            $content = $path . $view .$ext;
            foreach($data as $key => $val)
            {
                $$key = $val;
            }
            require_once __DIR__ . "/../views/layouts/header.php";
            require_once __DIR__ . "/../views/layouts/main.php";
            require_once __DIR__ . "/../views/layouts/footer.php";
        }else{
            die("Template file is not exist");
        }
    }
}