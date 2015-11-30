<?php

?>
<div class="post-form">
    <form method="post" action="<?= !empty($post->id) ? Application::createUrl(array('post' => 'update'), array('id' => $post->id)) : Application::createUrl(array('post' => 'add')) ?>" enctype="multipart/form-data">
        <?= !empty($post->id) ? '<input name="Post[post_id]" type="hidden" value="' . $post->id . '"' : null ?>
        <label for="title">Title:</label>

        <div class="post-title-block"><input value="<?= $post->title ?>" id="title" name="Post[title]" class="post-title" type="text"></div>
        <label for="image">Image:</label>

        <div class="post-file-block">
            <?php if(!empty($post->image)): ?>
                <div><img src="<?= Application::getParam('basePath') ?>uploads/post/<?= $post->image ?>" /></div>
                <br/>
            <?php endif ?>
            <input id="image" name="Post[image]" type="file"/>
        </div>

        <label for="status">Status:</label>

        <div class="post-status-block">
            <select name="Post[status]" id="status">

                <?php foreach( Status::model()->getAllStatus() as $status): ?>
                    <option value="<?= $status->id ?>" <?= !empty($post->status) && $post->status === $status->id ? 'selected' : null ?>><?= $status->label ?></option>
                <?php endforeach; ?>


            </select>
        </div>

        <label for="content">Content:</label>

        <div class="post-content-block"><textarea id="content" name="Post[content]" class="post-content"><?= !empty($post->content) ? $post->content : null ?></textarea>
        </div>

        <label for="tags">Tags:</label>

        <div class="post-tags-block"><input value="<?= !empty($tags) ? Tag::tagImplode($tags) : null; ?>" id="tags" name="Post[tags]" class="post-tags" type="text"></div>


        <?= !empty($post->id) ? '<div class="post-submit-block"><input class="post-submit" type="submit" value="Save"></div>' : '<div class="post-submit-block"><input class="post-submit" type="submit" value="Submit"></div>' ?>
    </form>
</div>