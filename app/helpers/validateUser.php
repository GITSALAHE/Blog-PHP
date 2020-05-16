<?php 

function validateUser($user){
        $errors = array();
    //Validate user 
    if(empty($user['username'])){
        array_push($errors, 'Username is required');
        }
        if(empty($user['email'])){
        array_push($errors, 'email is required');
        }
        if(empty($user['password'])){
        array_push($errors, 'password is required');
        }
        if($user['passwordConf'] !== $user['password']){
        array_push($errors, 'password do not match');
        }
        //Validate USER 
        //checking if there is an exist USER 
        // $existingUser  = selectOne('users', ['email' => $user['email']]);
        // $existingMail = selectOne('users', ['username' => $user['username']]);
        // // LET S BLOCK THE USER
        // if($existingUser){
        //     array_push($errors, 'EMAIL already exists');
        // }
        // if ($existingMail) {
        //     array_push($errors, 'username already exists');
        // }
        //checking existing email
        $existingMail  = selectOne('users', ['email' => $user['email']]);
        // LET S BLOCK THE post
        if($existingMail){
            if($user['update-user'] && $existingMail['id'] != $user['id']){
                array_push($errors, 'Email already exists');
            }
           if(isset($user['create-admin'])){
                array_push($errors, 'Email already exists');
           }
        }
        return $errors;
        //end verification
}

function validateLogin($user){
    $errors = array();
    if(empty($user['username'])){
        array_push($errors, 'Username is required');
        }

        if(empty($user['password'])){
            array_push($errors, 'password is required');
            }

    return $errors;
}