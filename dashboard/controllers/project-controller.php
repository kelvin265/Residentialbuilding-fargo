<?php
    include_once "../classes/project.php";
    // adding a new project
    if(isset($_POST["new_project_name"])){
        extract($_POST);
        $project = new Project();
        $project->project_name = $new_project_name;
        $project->customer_id = $customer_id;

        $project->newProject();
    }

    // Save Customer Specified timeframe
    if(isset($_POST["est_start_date"])){
        extract($_POST);
        $project = new Project();
        $project->est_start_date = $est_start_date;
        $project->est_end_date = $est_end_date;
        $project->project_id = $project_id;

        $project->editProject();
        header("location:../manage-my-projects.php");
    }

     // deleting a Project
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $project = new Project();
        $project->project_id = $delete_id;
        $project->deleteProject();

        header("location:../manage-projects.php");

    }

?>