<?php
    include_once "../classes/activity.php";
    // adding a new activity
    if(isset($_POST["new_name"])){
        extract($_POST);
        $activity = new Activity();
        $activity->name = $new_name;
        $activity->customer_id = $cusstomer_id;
        $activity->start_date = $start_date;
        $activity->end_date= $end_date;
        $activity->est_start_date = $est_start_date;
        $activity->est_end_date = $est_end_date;


        $activity->newactivity();
    }

     // deleting a activity
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $activity = new Activity();
        $activity->activity_id = $delete_id;
        $activity->deleteactivity();

        header("location:../manage-activities.php");

    }

?>