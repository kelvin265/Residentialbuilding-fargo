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

        public function new_est_Activity(){
            try{
                $data = " start_date = '$this->start_date' ";
                $data .= ", end_date = '$this->end_date' ";
                $data .= ", description = '$this->description' ";
                $data .= ", phase_id = '$this->phase_id' ";
                $data .= ", project_id = '$this->project_id' ";
                $data .= ", estimated = '$this->estimated' ";

                $query = "Select * from activities WHERE description='".$this->description."' and project_id='".$this->project_id."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This name of activity is already registered");
                }else{
                    $query = "INSERT INTO activities set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../project-assessment.php?project_id=$this->project_id");
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

        public function assignWorker(){
            try{
                $data = " worker_id = '$this->worker_id' ";
                $data .= ", activity_id = '$this->activity_id' ";

                $query = "Select * from activity_worker WHERE worker_id='".$this->worker_id."' and activity_id='".$this->activity_id."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This worker is already registered");
                }else{
                    $query = "INSERT INTO activity_worker set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-resources.php?activity_id=$this->activity_id");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function addMachine(){
            try{
                $data = " machine_id = '$this->machine_id' ";
                $data .= ", activity_id = '$this->activity_id' ";

                $query = "Select * from activity_machine WHERE machine_id='".$this->machine_id."' and activity_id='".$this->activity_id."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This machine is already added");
                }else{
                    $query = "INSERT INTO activity_machine set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-resources.php?activity_id=$this->activity_id");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function addMaterial(){
            try{
                $data = " material_id = '$this->material_id' ";
                $data .= ", activity_id = '$this->activity_id' ";
                $data .= ", quantity = '$this->quantity' ";

                $query = "Select * from activity_material WHERE material_id='".$this->material_id."' and activity_id='".$this->activity_id."'";
                $result = DB::DB_Query($query,DB::DB_Conn());

                if($result > 0){
                    throw new Exception("This material is already added");
                }else{
                    $query = "INSERT INTO activity_material set ".$data;
                    $result = DB::DB_Insert_Or_Update($query,DB::DB_Conn());
                    
                        header("location:../manage-resources.php?activity_id=$this->activity_id");
                }
            }
            catch (Exception $e){
                echo "Exception : " . $e->getMessage() . "<\ br>";
                echo "Code: " . $e->getCode() . "<\ br>";
            }
        }

        public function totalActivityCost($activity_id) {
            $total_cost = 0;
        
            // Query to retrieve machine cost
            $query_machine_cost = "SELECT SUM(total_cost) AS machine_cost FROM activity_machine_cost WHERE activity_id = $activity_id";
            $result_machine_cost = $this->select($query_machine_cost);
        
            // Check if the query was successful and fetch the result
            if ($result_machine_cost && $row = $result_machine_cost->fetch_assoc()) {
                // If there is a result row, extract the 'machine_cost' value from the row
                $machine_cost = $row['machine_cost'];
                // Add the machine cost to the total cost
                $total_cost += $machine_cost;
            }
        
            // Query to retrieve worker cost
            $query_worker_cost = "SELECT SUM(total_cost) AS worker_cost FROM activity_worker_cost WHERE activity_id = $activity_id";
            $result_worker_cost = $this->select($query_worker_cost);
        
            // Check if the query was successful and fetch the result
            if ($result_worker_cost && $row = $result_worker_cost->fetch_assoc()) {
                // If there is a result row, extract the 'worker_cost' value from the row
                $worker_cost = $row['worker_cost'];
                // Add the worker cost to the total cost
                $total_cost += $worker_cost;
            }
        
            // Query to retrieve material cost
            $query_material_cost = "SELECT SUM(total_cost) AS material_cost FROM activity_material_cost WHERE activity_id = $activity_id";
            $result_material_cost = $this->select($query_material_cost);
        
            // Check if the query was successful and fetch the result
            if ($result_material_cost && $row = $result_material_cost->fetch_assoc()) {
                // If there is a result row, extract the 'material_cost' value from the row
                $material_cost = $row['material_cost'];
                // Add the material cost to the total cost
                $total_cost += $material_cost;
            }
        
            // Return the computed total cost
            return $total_cost;
        }
        
        
    }


?>