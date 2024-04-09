<?php 
    require_once "db.php";
    class Worker
    {

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __get($name){
            if(isset($this->$name)){
                return $this->$name;
            }
        }

        public function newWorker(){
            try{
                $data = " first_name = '$this->first_name' ";
                $data .= ", last_name = '$this->last_name' ";
                $data .= ", address = '$this->address' ";
                $data .= ", phone = '$this->phone' ";
                $data .= ", worker_type_code = '$this->worker_type_code' ";
                $data .= ", gender = '$this->gender' ";

                $query = "Select * from workers WHERE first_name='".$this->first_name."' AND last_name='".$this->last_name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This type of worker is already registered");
                }else{
                    $query = "INSERT INTO workers set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-workers.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editWorker(){
            try{
                $data = " first_name = '$this->first_name' ";
                $data .= ", last_name = '$this->last_name' ";
                $data .= ", address = '$this->address' ";
                $data .= ", phone = '$this->phone' ";
                $data .= ", worker_type_code = '$this->worker_type_code' ";
                $data .= ", gender = '$this->gender' ";

                $query = "UPDATE workers set ".$data."WHERE worker_id='".$this->worker_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from workers";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteWorker(){
            $query = "DELETE FROM workers  where worker_id='".$this->worker_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>