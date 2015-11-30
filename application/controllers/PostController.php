<?php

class PostController extends Controller
{
    public function index()
    {
        $builder = new SqlBuilder();
        $posts = $builder->from('post')
            ->with(array('status' => array('status_name', 'label', 'id', 'status')))
            ->orderBy('DESC')
            ->query();


        $this->render('post/index', array('posts' => $posts));
    }

    public function show()
    {
        $postBuilder = new SqlBuilder();
        $post = $postBuilder->from('post')
            ->with(array('status' => array('status_name', 'label', 'id', 'status')))
            ->where(array('id = ' . $_GET['id']))
            ->limit(1)
            ->query();

        $tagsBuilder = new SqlBuilder();
        $tags = $tagsBuilder->select(array('tag'))
            ->from('tag')
            ->where(array('post_id = ' . $post->id))
            ->query();

        $commentBuilder = new SqlBuilder();
        $comments = $commentBuilder->from('comment')
            ->select(array('comment', 'email'))
            ->where(array('post_id = ' . $post->id))
            ->orderBy('DESC')
            ->query();
        $this->render('post/show', array('post' => $post, 'tags' => $tags, 'comments' => $comments));
    }

    public function delete()
    {
        $post_id = $_GET['id'];

        Post::model()->delete($post_id);
        Tag::model()->delete($post_id);
        Comment::model()->delete($post_id);

        Application::redirect(array('post' => 'index'));

    }

    public function comment()
    {
        $post_id = $_POST['Comment']['post_id'];
        if (isset($_POST['Comment'])) {
            $form = $_POST['Comment'];

            $email = $form['email'];
            $content = $form['content'];

            $comment = new Comment();
            $comment->post_id = $post_id;
            $comment->email = $email;
            $comment->comment = $content;
            $comment->save();

        }
        Application::redirect(array('post' => 'show'), array('id' => $post_id));
    }

    public function edit()
    {
        $postBuilder = new SqlBuilder();
        $post = $postBuilder->from('post')
            ->with(array('status' => array('status_name', 'label', 'id', 'status')))
            ->where(array('id = ' . $_GET['id']))
            ->limit(1)
            ->query();

        $tagsBuilder = new SqlBuilder();
        $tags = $tagsBuilder->select(array('tag'))
            ->from('tag')
            ->where(array('post_id = ' . $post->id))
            ->query();


        $this->render('post/edit', array('post' => $post, 'tags' => $tags));
    }

    public function update()
    {
        $data = $_POST['Post'];
        if (isset($data['post_id'])) {
            $post = new Post();
            $post->title = $data['title'];
            $post->content = strip_tags($data['content']);
            if (isset($_FILES['Post']))
                $post->uploadImage($_FILES['Post']);
            $post->status = $data['status'];


            $post->update($data['post_id']);

            if (isset($data['tags']))
                $post->updateTags($data['post_id'], $data['tags']);


            Application::redirect(array('post' => 'edit'), array('id' => $data['post_id']));
        }
    }

    public function add()
    {
        if (isset($_POST['Post'])) {

            $data = $_POST['Post'];

            $post = new Post();
            $post->title = $data['title'];
            $post->content = strip_tags($data['content']);
            if (isset($_FILES['Post']))
                $post->uploadImage($_FILES['Post']);
            $post->status = $data['status'];


            $post_id = $post->save();

            if (isset($data['tags']))
                $post->addTags($post_id, $data['tags']);


            Application::redirect(array('post' => 'index'));

        }
        $this->render('post/add', array('post' => new Post()));
    }
}