<?php 
    require_once "db.php";
    class Phase
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

        public function newPhase(){
            try{
                $data = "name = '$this->name' ";
                $data .= ",description = '$this->description' ";

                $query = "Select * from phases WHERE name='".$this->name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("phase is already registered");
                }else{
                    $query = "INSERT INTO phases set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-phases.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editPhase(){
            try{
                $data = "name = '$this->name' ";
                $data .= ",description = '$this->description' ";

                $query = "UPDATE phases set ".$data."WHERE phase_id='".$this->phase_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from phases";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deletePhase(){
            $query = "DELETE FROM phases  where phase_id='".$this->phase_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>