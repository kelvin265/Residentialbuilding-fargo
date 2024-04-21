<?php 
    require_once "db.php";
    class Material
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

        public function newMaterial(){
            try{
                $data = "material_name = '$this->material_name' ";
                $data .= ",price = '$this->price' ";
                $data .= ",description = '$this->description' ";

                $query = "Select * from materials WHERE material_name='".$this->name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("material is already registered");
                }else{
                    $query = "INSERT INTO materials set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-materials.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editMaterial(){
            try{
                $data = "material_name = '$this->material_name' ";
                $data .= ",price = '$this->price' ";
                $data .= ",description = '$this->description' ";

                $query = "UPDATE materials set ".$data."WHERE material_id='".$this->material_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from materials";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteMaterial(){
            $query = "DELETE FROM materials where material_id='".$this->material_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>