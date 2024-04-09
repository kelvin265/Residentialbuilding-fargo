<?php
    include_once "../classes/worker-type.php";
    // adding a new phase
    if(isset($_POST["new_worker_type_code"])){
        extract($_POST);
        $worker_type = new WorkerType();
        $worker_type->worker_type_code= $new_worker_type_code;
        $worker_type->worker_type_description= $new_worker_type_description;
        $worker_type->hourly_rate = $hourly_rate ;

        $worker_type->newWorkerType();
    }

     // deleting a phase
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $worker_type = new WorkerType();
        $worker_type->worker_type_code = $delete_id;
        $worker_type->deleteWorkerType();

        header("location:../manage-worker-types.php");

    }

?>