<div class="post-form">
    <form method="post" action="<?= Application::createUrl(array('post' => 'add')) ?>">
        <label for="title">Title:</label>

        <div class="post-title-block"><input id="title" name="Post[title]" class="post-title" type="text"></div>
        <label for="image">Image:</label>

        <div class="post-file-block">
            <input id="image" name="Post[image]" type="file"/>
        </div>

        <label for="status">Status:</label>

        <div class="post-status-block">
            <select name="Post[status]" id="status">
                <option value="1">New</option>
                <option value="2">Open</option>
                <option value="3">Closed</option>
            </select>
        </div>

        <label for="content">Content:</label>

        <div class="post-content-block"><textarea id="content" name="Post[content]" class="post-content"></textarea>
        </div>

        <label for="tags">Tags:</label>

        <div class="post-tags-block"><input id="tags" name="Post[tags]" class="post-tags" type="text"></div>


        <div class="post-submit-block"><input class="post-submit" type="submit" value="Submit"></div>
    </form>
</div>