<?php

class PostController extends Controller
{
    public function index()
    {
        $builder = new SqlBuilder();
        $posts = $builder->from('post')
            ->with(array('status' => 'label'))
            ->query();

        $this->render('post/index', array('posts' => $posts));
    }

    public function add()
    {
        if (isset($_POST['Post'])) {

            $data = $_POST['Post'];

            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->uploadImage($data['image']);
            $post->status = $data['status'];
            $post->addTags($data['tags']);
            $post->save();

        }
        $this->render('post/add');
    }
}