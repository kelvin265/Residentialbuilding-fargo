<?php
    include_once "../classes/project.php";
    // adding a new project
    if(isset($_POST["new_name"])){
        extract($_POST);
        $project = new Project();
        $project->name = $new_name;
        $project->description = $description;

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