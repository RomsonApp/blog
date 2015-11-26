<?php
/**
 * @var $post Post
 */
?>
<h1>Blog</h1>
<div>
    <?php if (!isset($posts) && empty($posts)): ?>
        <p>Records is not exist</p>;
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p>Title: <?= $post->title ?> <span class="right">Status: <?= $post->status ?></span> </p>
                <br/>
                <p><?= $post->content ?></p>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>
    <div>
