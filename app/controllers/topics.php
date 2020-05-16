<?php 

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateTopic.php");
include(ROOT_PATH . "/app/helpers/middleware.php");


$table = 'topics'; 

$errors = array();
$id = '';
$name = '';
$description = '';

$topics = selectAll($table);

// ADDING TOPIC 
if(isset($_POST['add-topic'])){
    adminOnly();
    $errors = validateTopic($_POST); // VALIDATE ADDING TOPIC

    // IF THERE IS NO ERROR 
    if (count($errors) === 0) {
        //RUN THE ADDING TOPIC 
        unset($_POST['add-topic']);
        $topic_id = create($table, $_POST);
        $_SESSION['message'] = 'Topic added';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    }
   else{
       $name = $_POST['name'];
       $description = $_POST['description'];
   }
}

// SHOWING ALL TOPICS IN INDEX.PHP
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

// UPDATING TOPIC 
if (isset($_POST['update-topic'])) {
    adminOnly();
    $errors = validateTopic($_POST); // VALIDATE UPDATING TOPIC

    // IF THERE IS NO ERROR 
    if (count($errors) === 0) {
    $id = $_POST['id'];
    unset($_POST['update-topic'], $_POST['id']);
    $topic_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'Topic updated !';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();

}
    else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
    
}

// DELETE TOPIC 
if(isset($_GET['del_id'])){
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic Deleted !';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}