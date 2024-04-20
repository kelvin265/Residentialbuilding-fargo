<?php
    include_once "../classes/activity.php";
    // adding a new activity
    if(isset($_POST["est_description"])){
        extract($_POST);
        $activity = new Activity();
        $activity->estimated = 1;
        $activity->phase_id = $phase_id;
        $activity->project_id = $project_id;
        $activity->end_date= $end_date;
        $activity->start_date = $start_date;
        $activity->description = $est_description;


        $activity->new_est_Activity();
    }

     // deleting a activity
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $activity = new Activity();
        $activity->activity_id = $delete_id;
        $activity->deleteActivity();

        header("location:../manage-activities.php");

    }

?>