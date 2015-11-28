<?php
/**
 * @var $post Post
 */

?>
<h1>Blog</h1>

<div class="post-block">
    <div class="post-add">
        <a class="post-add-btn" href="<?= Application::createUrl(array('post' => 'add')) ?>">New Post</a>
    </div>
    <?php if (!isset($posts) && empty($posts)): ?>
        <p>Records is not exist</p>;
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="title-block">
                    <div class="title"><a
                            href="<?= Application::createUrl(array('post' => 'show'), array('id' => $post->id)) ?>"> <?= $post->title ?></a>
                    </div>
                    <div class="status">
                        status: <?= $post->status_name ?>
                    </div>
                    <div class="buttons">
                        <a class="btn" href="<?= Application::createUrl(array('post' => 'edit'), array('id' => $post->id)) ?>">Edit</a>
                        <a class="btn" href="<?= Application::createUrl(array('post' => 'delete'), array('id' => $post->id)) ?>">Delete</a>
                    </div>
                </div>
                <div class="content-block">

                    <div class="content">
                        <img src="/uploads/post/<?= $post->image ?>"/>
                        <?= $post->content ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
