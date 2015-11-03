<?php
    $BlogsController = new BlogsController($db, $table_name, $action);
    $BlogsController->_new($_POST);
?>

<div>
  <form action="" method="post">
    <div>
      <input type="text" name="title">
    </div>
    <div>
      <textarea name="body"></textarea>
    </div>
    <div>
      <?php echo link_to('index', '&laquo;&nbsp;戻る'); ?><input type="submit" value="記事投稿">
    </div>
  </form>
</div>
