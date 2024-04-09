<?php 
    require_once "db.php";
    class Part
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

        public function newPart(){
            try{
                $data = "part_name = '$this->part_name' ";
                $data .= ",price = '$this->price' ";
                $data .= ",description = '$this->description' ";

                $query = "Select * from parts WHERE part_name='".$this->name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("part is already registered");
                }else{
                    $query = "INSERT INTO parts set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-parts.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editPart(){
            try{
                $data = "part_name = '$this->part_name' ";
                $data .= ",price = '$this->price' ";
                $data .= ",description = '$this->description' ";

                $query = "UPDATE parts set ".$data."WHERE part_id='".$this->part_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from parts";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deletePart(){
            $query = "DELETE FROM parts where part_id='".$this->part_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>