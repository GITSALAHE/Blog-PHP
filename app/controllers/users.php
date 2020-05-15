<?php 

require(ROOT_PATH . "/app/database/db.php");
require(ROOT_PATH . "/app/helpers/validateUser.php");
        
    //initialization
        $errors = array();
        $username = '';
        $email = '';
        $password = '';
        $passwordConf = '';
        $table = 'users';


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

        if(isset($_POST['register-btn'])) {
    
            $errors = validateUser($_POST);
            //if there is no error 
            if(count($errors) === 0){

                unset($_POST['register-btn'], $_POST['passwordConf']);

                $_POST['admin'] = 0;
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
                $user_id = create($table, $_POST);
                $user = selectOne($table, ['id' => $user_id]);

                //if sucess the login traitement run
                loginuser($user);
               
            }
                //but if we had an error for saving data in input 
                else{
                        $username = $_POST['username'];
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

?>