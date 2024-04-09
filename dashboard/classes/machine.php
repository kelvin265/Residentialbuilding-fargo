<?php 
    require_once "db.php";
    class Machine
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

        public function newMachine(){
            try{
                $data = "name = '$this->name' ";
                $data .= ",description = '$this->description' ";
                $data .= ",daily_rate = '$this->daily_rate' ";

                $query = "Select * from machines WHERE name='".$this->name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("machine is already registered");
                }else{
                    $query = "INSERT INTO machines set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-machines.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editMachine(){
            try{
                $data = "name = '$this->name' ";
                $data .= ",description = '$this->description' ";
                $data .= ",daily_rate = '$this->daily_rate' ";

                $query = "UPDATE machines set ".$data."WHERE machine_id='".$this->machine_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from machines";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteMachine(){
            $query = "DELETE FROM machines where machine_id='".$this->machine_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>