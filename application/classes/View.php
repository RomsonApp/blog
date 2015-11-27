<?php

class View
{

    public function template($view, $data = array(), $partial = true)
    {
        
        $path = __DIR__ . "/../views/";
        $ext = ".php";

        if (file_exists($path . $view . $ext)) {
            $content = $path . $view . $ext;

            foreach ($data as $key => $val) {
                $$key = $val;
            }

            $partial ? include __DIR__ . "/../views/layouts/header.php" : null;
             include __DIR__ . "/../views/layouts/main.php";
            $partial ? include __DIR__ . "/../views/layouts/footer.php" : null;

        } else {
            die("Template file is not exist");
        }
    }

    public function render($view, $data = array())
    {
        $this->template($view, $data);
    }


    public function renderPartial($view, $data = array())
    {
        $this->template($view, $data, false);
    }

}