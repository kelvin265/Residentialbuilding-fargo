<?php
    include_once "../classes/worker.php";
    // adding a new phase
    if(isset($_POST["new_first_name"])){
        extract($_POST);
        $worker = new Worker();
        $worker->first_name= $new_first_name;
        $worker->last_name= $last_name;
        $worker->address = $address ;
        $worker->gender= $gender;
        $worker->phone= $phone;
        $worker->worker_type_code = $worker_type_code ;

        $worker->newWorker();
    }

     // deleting a phase
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $worker = new Worker();
        $worker->worker_id = $delete_id;
        $worker->deleteWorker();

        header("location:../manage-workers.php");

    }

    // selecting a worker according to worker type code
    if(isset($_GET["selectedValue"])){
        extract($_GET);
        $worker = new Worker();
        $query = "select worker_id, concat(first_name, ' ', last_name) as name from workers where worker_type_code='".$selectedValue."'";
        $workers = $worker->select($query);

        $options = [];
        while($row = $workers->fetch_assoc()){
            $options[] = $row;
        }

        echo json_encode($options);
    }

?>