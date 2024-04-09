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

    // logout

    if(isset($_GET['logout_action'])){
        $user = new User();
        $user->logout();
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

    // Changing password
    if(isset($_POST['old_password'])){
        try{
            extract($_POST);
            $user = new User();     
            if(password_verify($old_password,$_SESSION['login_password'])){
                $user->password = password_hash($new_password, PASSWORD_DEFAULT);
                $user->user_id = $_SESSION['login_user_id'];
                $user->editUser();
                $_SESSION['login_password'] = $user->password;
            }else{
                throw new Exception("Password does not match");
            }
        }catch (Exception $e){
            echo "Exception : " . $e->getMessage() . "<\ br>";
            echo "Code: " . $e->getCode() . "<\ br>";
        }
        
    }

    // Changing user details
    if(isset($_POST['update_email'])){
        try{
        extract($_POST);
        $user = new User();     
        $user->user_id = $_SESSION['login_user_id'];
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $update_email;
        $user->dob = $dob;
        $user->gender = $gender;
        $user->editUser();
    
        $_SESSION['login_first_name'] = $user->first_name;
        $_SESSION['login_last_name'] = $user->last_name;
        $_SESSION['login_email'] = $user->email;
        $_SESSION['login_dob'] = $user->dob;
        $_SESSION['login_gender'] = $user->gender;      
        }catch (Exception $e){
        echo "Exception : " . $e->getMessage() . "<\ br>";
        echo "Code: " . $e->getCode() . "<\ br>";
        }
        
    }
?>