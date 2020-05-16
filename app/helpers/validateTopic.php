<?php 

function validateTopic($topic){
        $errors = array();
    //Validate Topic if emty 
    if(empty($topic['name'])){
        array_push($errors, 'Name is required');
        }
  
        //Validate topic 
        //checking if there is an exist topic 
        // $existingTopic  = selectOne('topics', ['name' => $topic['name']]);
        // // SO LET S BLOCK HIM 
        // if($existingTopic){
        //     array_push($errors, 'name already exists');
        // }


        $existingTopic  = selectOne('topics', ['name' => $topic['name']]);
        // LET S BLOCK THE post
        if($existingTopic){
            if($topic['update-topic'] && $existingTopic['id'] != $topic['id']){
                array_push($errors, 'Topic with that name already exists');
            }
           if(isset($topic['add-topic'])){
                array_push($errors, 'topic with that name already exists');
           }
        }
        return $errors;
        //end verification
}

