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
                    <div class="title"><?= $post->title ?></div>
                    <div class="status">
                        status: <?= $post->status ?>
                    </div>
                    <div class="buttons">
                        <a class="btn" href="#">Edit</a>
                        <a class="btn" href="#">Delete</a>
                    </div>
                </div>
                <div class="content-block">
                    <div class="image">

                    </div>
                    <div class="content">
                        <?= $post->content ?>
                    </div>
                </div>
                <div class="tags">
                    <?= $post->tags ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
