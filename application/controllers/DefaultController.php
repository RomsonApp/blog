<?php

class DefaultController extends Controller{
    public function index(){
        $this->render('default/index', array('posts' => Post::model()->findAll('post')));
    }
}