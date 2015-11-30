<div style="text-align: center"> <a href="<?= Application::createUrl(array('post' => 'index')) ?>">Go to main page</a></div>
<?php $this->renderPartial('post/__form', array('post' => $post)); ?>
