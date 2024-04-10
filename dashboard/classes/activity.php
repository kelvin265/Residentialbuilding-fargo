<?php 
    require_once "db.php";
    class Activity
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

        public function newActivity(){
            try{
                $data = " start_date = '$this->start_date' ";
                $data .= ", end_date = '$this->end_date' ";
                $data .= ", est_start_date = '$this->est_end_date' ";
                $data .= ", est_end_date = '$this->est_end_date' ";
                $data .= ", customer_id = '$this->customer_id' ";
                $data .= ", activity_name = '$this->activity_name' ";
                $data .= ", phase_id = '$this->phase_id' ";
                $data .= ", project_id = '$this->project_id' ";
                $data .= ", img_url = '$this->img_url' ";

                $query = "Select * from activitys WHERE name='".$this->name;
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This name of activity is already registered");
                }else{
                    $query = "INSERT INTO activitys set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-activities.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editActivity(){
            try{
                $data = " start_date = '$this->start_date' ";
                $data .= ", end_date = '$this->end_date' ";
                $data .= ", est_start_date = '$this->est_end_date' ";
                $data .= ", est_end_date = '$this->est_end_date' ";
                $data .= ", customer_id = '$this->customer_id' ";
                $data .= ", description = '$this->activity_name' ";
                $data .= ", phase_id = '$this->phase_id' ";
                $data .= ", project_id = '$this->project_id' ";
                $data .= ", img_url = '$this->img_url' ";

                $query = "UPDATE activities set ".$data."WHERE activity_id='".$this->activity_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from activities";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteActivity(){
            $query = "DELETE FROM activities  where activity_id='".$this->activity_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

    }


?>