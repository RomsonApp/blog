<?php

class Comment extends Model{
    public $id;
    public $post_id;
    public $email;
    public $comment;

    public function attributes(){
        return array(
            'post_id',
            'email',
            'comment',
        );
    }

    public function delete($id)
    {
        $this->query("DELETE FROM comment WHERE post_id = {$id}");
    }
}