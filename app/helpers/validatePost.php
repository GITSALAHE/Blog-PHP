<?php
function validatePost($post){
    $errors = array();
//Validate require post  
if(empty($post['title'])){
    array_push($errors, 'title is required');
    }

   if($post['body'] === "<p>&nbsp;</p>"){
    array_push($errors, 'body is required');
    }
    if(empty($post['topic_id'])){
    array_push($errors, 'Please select a topic');
    }
  
    //Validate Post 
    //checking if there is an exist Post 
    $existingPost  = selectOne('posts', ['title' => $post['title']]);
    // LET S BLOCK THE post
    if($existingPost){
        if($post['update-post'] && $existingPost['id'] != $post['id']){
            array_push($errors, 'Post with that title already exists');
        }
       if(isset($post['add-post'])){
            array_push($errors, 'Post with that title already exists');
       }
    }
 
    return $errors;
    //end verification
}