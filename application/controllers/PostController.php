<?php

class PostController extends Controller{
    public function index(){
        $builder = new SqlBuilder();
        $posts = $builder->from('post')
            ->with(array('status' => 'label'))
            ->query();

        $this->render('post/index', array('posts' => $posts));
    }

    public function add(){
       $this->render('post/add');
    }
}