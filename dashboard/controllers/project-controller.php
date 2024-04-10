<?php
    include_once "../classes/project.php";
    // adding a new project
    if(isset($_POST["new_name"])){
        extract($_POST);
        $project = new Project();
        $project->name = $new_project_name;
        $project->customer_id = $cusstomer_id;
        $project->start_date = $start_date;
        $project->end_date= $end_date;
        $project->est_start_date = $est_start_date;
        $project->est_end_date = $est_end_date;


        $project->newProject();
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