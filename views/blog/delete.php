<?php
    $BlogsController = new BlogsController($db, $table_name, $action);
    $BlogsController->delete($id);
?>
