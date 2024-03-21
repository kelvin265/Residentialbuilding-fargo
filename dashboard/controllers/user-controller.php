<?php
    include_once "../classes/user.php";
    // Data From The Login Page is Processed Here:
    if(isset($_POST['login_email'])){       
        extract($_POST);
        $user = new User();
        $user->email = $login_email;
        $user->password = $login_password;
        $user->login();
    }



    // adding a new user
    if(isset($_POST["email"])){
        extract($_POST);
        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        
        if($user_type == "1"){
            $user->gender = $gender;
            $user->dob = $dob;
        }
        
        $user->user_type = $user_type;

        $user->newUser();

    }

    
    // deleting a user
    if(isset($_GET["delete_id"])){
        extract($_GET);
        $user = new User();
        $user->user_id = $delete_id;
        $user->deleteUser();

        header("location:../manage-users.php");

    }
?>