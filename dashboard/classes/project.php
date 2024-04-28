<?php 
    require_once "db.php";
    class Project
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

        public function newProject(){
            echo $this->project_name;
            try{
                $data = "project_name = '$this->project_name' ";
                $data .= ",customer_id = '$this->customer_id' ";

                $query = "Select * from projects where project_name='".$this->project_name."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This name of project is already registered");
                }else{
                    $query = "INSERT INTO projects set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-projects.php");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function editProject(){
            try{
                $data = "";
                if(isset($this->start_date)){
                    $data = "status = 'inprogress' ";
                    $query = "Select * from projects where project_id='".$this->project_id."' and status='pending'";
                    $result = DB::DB_Query($query,DB::DB_Conn());

                    if($result > 0){
                        $data .= ", start_date = '$this->start_date' ";
                    }
                    
                }
                if(isset($this->end_date)){
                    $data = " end_date = '$this->end_date' ";
                }
                if(isset($this->est_start_date )){
                    $data = "est_start_date = '$this->est_start_date' ";
                    $data .= ", est_end_date = '$this->est_end_date' ";
                }

                $query = "UPDATE projects set ".$data."WHERE project_id='".$this->project_id."'";
                DB::DB_Insert_Or_Update($query,DB::DB_Conn());
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function selectAll(){
            $query = "Select * from projects";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }
    
        public function select($query){
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }


        public function deleteProject(){
            $query = "DELETE FROM projects  where project_id='".$this->project_id."'";
            $result = DB::DB_Read($query,DB::DB_Conn());
            return $result;
        }

        function daysBetweenDates($date1, $date2) {
            // Create DateTime objects from the dates
            $dateObj1 = new DateTime($date1);
            $dateObj2 = new DateTime($date2);
          
            // Calculate the difference between the dates
            $interval = $dateObj1->diff($dateObj2);
          
            // Return the number of days (consider using $interval->format('%d') for formatted output)
            return $interval->days;
          }

    }


?>