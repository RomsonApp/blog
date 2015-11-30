<?php
/**
 * @var $post Post
 * @var $comment Comment
 */

?>
<div style="text-align: center"> <a href="<?= Application::createUrl(array('post' => 'index')) ?>">Go to main page</a></div>
<div class="post-block">
    <div class="post">
        <div class="title-block">
            <div class="title"><?= $post->title ?>
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
            <div class="image">
                <img src="<?= Application::getParam('basePath') ?>uploads/post/<?= $post->image ?>"/>
            </div>
            <div class="content">
                <?= $post->content ?>
            </div>
        </div>
        <div class="post-tags-block">
            <div class="post-tags"><strong>Tags:</strong> <?= !empty($tags) ? Tag::tagImplode($tags) : null; ?></div>
        </div>
    </div>
</div>

<div class="comment-add-block">
    <h4>Add Comment</h4>
    <form method="post" action="<?= Application::createUrl(array('post' => 'comment'), array('id' => $post->id)) ?>">
        <input type="hidden" name="Comment[post_id]" value="<?= $post->id ?>" />
        <div class="comment-email"><input name="Comment[email]" type="text" placeholder="email"></div>
        <div class="comment-content"><textarea name="Comment[content]" placeholder="Comment text"></textarea></div>
        <div class="comment-submit"><input type="submit" value="Add comment"></div>
    </form>
</div>
<?php if(!empty($comments)): ?>

<div class="comment-block">
    <br />
    <br />
    <hr />
    <br />
    <br />
    <?php foreach($comments as $comment): ?>

        <div class="comment-email"><strong>Email: </strong><?= $comment->email ?></div>
        <div class="comment-content"><strong>Comment: </strong><br/><?= $comment->comment ?></div>
        <br />
        <br />
        <hr />
        <br />
        <br />
        <?php endforeach; ?>
</div>
<?php endif; ?>
