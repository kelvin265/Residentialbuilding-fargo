<?php 
    require_once "db.php";
    class WorkerType
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

        public function newWorkerType(){
            try{
                $data = "worker_type_description = '$this->worker_type_description' ";
                $data .= ",hourly_rate = '$this->hourly_rate' ";
                $data .= ",worker_type_code = '$this->worker_type_code' ";

                $query = "Select * from worker_types WHERE worker_type_code='".$this->worker_type_code."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This type of worker is already registered");
                }else{
                    $query = "INSERT INTO worker_types set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-worker-types.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editWorkerType(){
            try{
                $data = "worker_type_description = '$this->worker_type_description' ";
                $data .= ",hourly_rate = '$this->hourly_rate' ";

                $query = "UPDATE worker_types set ".$data."WHERE worker_type_code='".$this->worker_type_code."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from worker_types";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteWorkerType(){
            $query = "DELETE FROM worker_types  where worker_type_code='".$this->worker_type_code."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>