<div class="post-form">
    <form method="post" action="<?= Application::createUrl(array('post' => 'add')) ?>">
        <label for="title">Title:</label>

        <div class="post-title-block"><input id="title" name="Post[title]" class="post-title" type="text"></div>
        <label for="content">Content:</label>

        <div class="post-content-block"><textarea id="content" name="Post[content]" class="post-content"></textarea></div>

        <label for="tags">Tags:</label>

        <div class="post-tags-block"><input id="tags" name="Post[tags]" class="post-tags" type="text"></div>


        <div class="post-submit-block"><input class="post-submit" type="submit" value="Submit"></div>
    </form>
</div>