<?php

class Tag extends Model
{
    public $id;
    public $post_id;
    public $tag;

    public function attributes(){
        return array(
            'post_id',
            'tag',
        );
    }
    public function addTags($post_id,  $tags)
    {
        if(!isset($tags) || empty($tags)){
            return false;
        }

        $tagArray = array_map(function($item){
            return "'" . trim($item) . "'";
        }, explode(',', $tags));
        $sql = '';
        foreach($tagArray as $tag){
            $sql .= "INSERT INTO tag (post_id, tag) VALUES ({$post_id}, {$tag}); ";
        }
        
       $this->query($sql);
    }

    public function updateTags($post_id, $tags){
        $this->query("DELETE FROM tag WHERE post_id = {$post_id}");
        $this->addTags($post_id, $tags);
    }


    public static function tagImplode($tags)
    {
        $result = '';

        foreach($tags as $tag)
        {
            $result[] = $tag->tag;
        }
        return implode(', ', $result);
    }

    public function delete($id)
    {
        $this->query("DELETE FROM tag WHERE post_id = {$id}");
    }
}