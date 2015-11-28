<?php

class DefaultController extends Controller{
    public function index(){
        Application::redirect(array('post' => 'index'));
    }


}