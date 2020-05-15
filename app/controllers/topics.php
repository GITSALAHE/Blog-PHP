<?php 
require(ROOT_PATH . "/app/database/db.php");

if(isset($_POST['add-topic'])){
    unset($_POST['add-topic']);
    $topic_id = create('topics', $_POST);
    $_SESSION['message'] = 'Topic added successfully ! ';
    $_SESSION['type'] = 'success';
    header('location '. BASE_URL . '/admin/topics/index.php');
    exit();
} 