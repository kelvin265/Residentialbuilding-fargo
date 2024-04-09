<?php
    include_once "../classes/machine.php";
    // adding a new Machine
    if(isset($_POST["new_name"])){
        extract($_POST);
        $machine = new Machine();
        $machine->name = $new_name;
        $machine->description = $description;
        $machine->daily_rate = $daily_rate;

        $machine->newMachine();
    }

     // deleting a Machine
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $machine = new Machine();
        $machine->machine_id = $delete_id;
        $machine->deleteMachine();

        header("location:../manage-machines.php");

    }

?>