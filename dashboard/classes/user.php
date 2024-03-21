<?PHP
session_start();
include_once "db.php";
class User {

// setters and getters
    public function __set($property,$value){
        $this->$property = $value;
    }
    public function __get($property){
        if(isset($this->$property)){
            return $this->$property;
        }
    }

    public function login(){
        try{
            $query = "SELECT * FROM users where email = '".$this->email."'";
            $result = DB::DB_Query($query,DB::DB_Conn());
            if($result > 0 ){    
                $user = mysqli_fetch_assoc(DB::DB_Read($query,DB::DB_Conn()));    
                if(password_verify($this->password,$user["password"])){
                    foreach ($user as $key => $value){
                        if($key != 'pass' && !is_numeric($key)){ 
                            $_SESSION['login_'.$key] = $value;
                        }
                    }
                    header("location:dashboard.php");
                }
                else{
                    throw new Exception("Incorrect password: ". $this->password);
                }
            }else{
                throw new Exception("Cannot find: ". $this->email);
            }
        }
        catch (Exception $e){
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            $_SESSION['error_message'] = "Exception : " . $e->getMessage() . ", Code: " . $e->getCode() . "<\ br>";
            header("location:../index.php");
        }
    }
   
    public function logout(){
        try{   
            session_destroy();
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            header("location:index.php");
            
        }
        catch (Exception $e){
            echo "Exception : " . $e->getMessage() . "<\ br>";
            echo "Code: " . $e->getCode() . "<\ br>";
        }
    }


    public function editUser(){
        try{
            $data = "";
            if(isset($this->first_name)){
                $data = " first_name = '$this->first_name' ";
            }
            if(isset($this->last_name)){
                $data .= ", last_name = '$this->last_name' ";
            }
            if(isset($this->email)){
                $data .= ", email = '$this->email' ";
            }
            if(isset($this->user_type)){
                $data .= ", user_type = '$this->user_type' ";
            }
            
            if(isset($this->password)){
                $data .= "password = '$this->password' ";
            }
            if(isset($this->dob)){
                $data .= ", dob = '$this->dob' ";
            }
            if(isset($this->gender)){
                $data .= ", gender = '$this->gender' ";
            }

            $query = "UPDATE users set ".$data."WHERE user_id='".$this->user_id."'";
            $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());

            if($result < 1){
                throw new Exception("Failed to update user details");
            }

        }
        catch (Exception $e){
            $_SESSION['error_message'] = "Exception : " . $e->getMessage() . ", Code: " . $e->getCode() . "<\ br>";
            header("location:../auth-register.php");
        }
    }

    public function newUser(){
        try{
            $data = " first_name = '$this->first_name' ";
            $data .= ", last_name = '$this->last_name' ";
            $data .= ", email = '$this->email' ";
            $data .= ", user_type = '$this->user_type' ";
            $data .= ", password = '$this->password' ";
            $data .= ", dob = '$this->dob' ";
            $data .= ", gender = '$this->gender' ";


            $query = "Select * from users WHERE email='".$this->email."'";
            $result = DB::DB_Query($query,DB::DB_Conn());

            if($result > 0){
                throw new Exception("Email is already registered to another user");
            }else{
                $query = "INSERT INTO users set ".$data;
                $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                if($result > 0){
                    if($this->user_type == "0")
                    {
                        foreach ($_SESSION as $key => $value) {
                            unset($_SESSION[$key]);
                        }
                        $_SESSION['message'] = "User registered successfully, you can now login";
                        header("location:../index.php");
                    }
                }
                
            }

        }
        catch (Exception $e){
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            $_SESSION['error_message'] = "Exception : " . $e->getMessage() . ", Code: " . $e->getCode() . "<\ br>";
            header("location:../auth-register.php");
        }
    }


    public function selectAllUsers(){
        $query = "Select * from users";
        $result = DB::DB_Read($query,DB::DB_Conn());
        return $result;
    }
    public function select($query){
        $result = DB::DB_Read($query,DB::DB_Conn());
        return $result;
    }
    public function deleteUser(){
        $query = "DELETE FROM users  where user_id='".$this->user_id."'";
        $result = DB::DB_Read($query,DB::DB_Conn());
        return $result;
    }
}
