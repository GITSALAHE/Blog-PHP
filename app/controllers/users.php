<?php 

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/middleware.php");

    //initialization
        $errors = array();
        $admin = '';
        $username = '';
        $email = '';
        $password = '';
        $passwordConf = '';
        $table = 'users';
        $id = '';
        //selecting all admin users
        $admin_users = selectAll($table);
     function loginUser($user){
         // Log user in 
         $_SESSION['id'] = $user['id'];
         $_SESSION['username'] = $user['username'];
         $_SESSION['admin'] = $user['admin'];
         $_SESSION['message'] = 'YOU ARE NOW LOGGED IN';
         $_SESSION['type'] = 'success';

         if ($_SESSION['admin']) {
             header('location: ' . BASE_URL . '/admin/dashboard.php');

         }
         else {
             header('location: ' . BASE_URL . '/index.php');
         }
         
         exit();
     }

     //Register 

        if(isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    
            $errors = validateUser($_POST);
            //if there is no error 
            if(count($errors) === 0){

                unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                //These is for giving admin in admin dashbord 
                    if (isset($_POST['admin'])) {
                    $_POST['admin'] = 1;
                    $user_id = create($table, $_POST);
                    $_SESSION['message'] = "Admin user created !";
                    $_SESSION['type'] = "success";
                    header('location: ' . BASE_URL . '/admin/users/index.php');
                    exit();
                    } 
                    
                 else { //and this in register form 
                    $_POST['admin'] = 0;
                    $user_id = create($table, $_POST);
                    $user = selectOne($table, ['id' => $user_id]);

                    //if sucess the login traitement run
                    loginuser($user);
                }
                
                
               
            }
                //but if we had an error for saving data in input 
                else{
                        $username = $_POST['username'];
                        $admin = isset($_POST['admin']) ? 1 : 0 ;
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $passwordConf = $_POST['passwordConf'];
                }
         }


//getting data to update it in the form update 
if(isset($_GET['id'])){
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}


//UPDATING ADMIN IN ADMIN DASHBOARD 
if(isset($_POST['update-user'])){
    adminOnly();
   $errors = validateUser($_POST);

   if(count($errors) === 0){
       $id = $_POST['id'];
       unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
       $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

       $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
       $count = update($table, $id, $_POST);
       $_SESSION['message'] = 'User updated !';
       $_SESSION['type'] = 'success';
       header('location: ' . BASE_URL . '/admin/users/index.php');
       exit();
   }

   else{
       $username = $_POST['username'];
       $admin = isset($_POST['admin']) ? 1 : 0;
       $email = $_POST['email'];
       $password = $_POST['password'];
       $passwordConf = $_POST['passwordConf'];
   }
}

//LOgin now 

if (isset($_POST['login-btn'])) {
//include validateLogin 
$errors = validateLogin($_POST);
if (count($errors) === 0) {
//selecting from DB 
$user = selectOne($table, ['username' => $_POST['username']]);
if($user && password_verify($_POST['password'], $user['password'])){
//if sucess the login run
loginuser($user);
}
//if there is error 
else{
array_push($errors, 'Wrong login');
}
}

//to not lost data input
$username = $_POST['username'];
$password = $_POST['password'];
}

//delete admin in dashboard admin 
if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Admin user deleted !";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}


?>