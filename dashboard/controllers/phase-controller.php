<?php
    include_once "../classes/phase.php";
    // adding a new phase
    if(isset($_POST["new_name"])){
        extract($_POST);
        $phase = new Phase();
        $phase->name = $new_name;
        $phase->description = $description;

        $phase->newPhase();
    }

     // deleting a phase
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $phase = new Phase();
        $phase->phase_id = $delete_id;
        $phase->deletePhase();

        header("location:../manage-phases.php");

    }

?>