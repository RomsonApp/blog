<?php

class Post extends Model
{
    public $id;
    public $title;
    public $content;
    public $status;
    public $image;


    public function attributes()
    {
        return array(
            'title',
            'content',
            'status',
            'image',
        );
    }


    public function uploadImage($file)
    {
        $file_name = parent::uploadImage($file);
        $this->image = $file_name;
    }

    public function addTags($post_id, $tags)
    {

        $tagModel = new Tag();
        $tagModel->addTags($post_id, $tags);
    }

    public function updateTags($post_id, $tags){
        $tagModel = new Tag();
        $tagModel->updateTags($post_id, $tags);
    }

    public function delete($id)
    {
        $this->query("DELETE FROM post WHERE id = {$id}");
    }


}