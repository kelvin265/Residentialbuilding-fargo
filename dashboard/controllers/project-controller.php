<?php
    include_once "../classes/project.php";
    require_once "../classes/user.php";
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

    // project progress monitoring
    if(isset($_GET["project_progress"])){
        extract($_GET);
        $project = new Project();
        $project->project_id = $project_progress;
        

        // Query to get estimated and actual activities count for each project
        $sql = "SELECT p.project_name, COUNT(CASE WHEN a.estimated = 1 THEN a.activity_id END) AS estimated_activities, COUNT(CASE WHEN a.estimated = 0 THEN a.activity_id END) AS actual_activities FROM projects p LEFT JOIN activities a ON p.project_id = a.project_id GROUP BY p.project_name;";
        $result = $project->select($sql);

        $data = array();

        if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            while($row = $result->fetch_assoc()) {
                $data[] = array(
                    "project_name" => $row["project_name"],
                    "estimated_activities" => $row["estimated_activities"],
                    "actual_activities" => $row["actual_activities"]
                );
            }
        }


        // Encode data as JSON and send it back to JavaScript
        echo json_encode($data);



    }

    // deleting a Project
    if(isset($_GET["my_project_progress"])){
        extract($_GET);
        $customer =
        $project = new Project();
        $project->project_id = $my_project_progress;
        

        // Query to get estimated and actual activities count for each project
        $sql = "SELECT p.project_name, COUNT(CASE WHEN a.estimated = 1 THEN a.activity_id END) AS estimated_activities, COUNT(CASE WHEN a.estimated = 0 THEN a.activity_id END) AS actual_activities FROM projects p LEFT JOIN activities a ON p.project_id = a.project_id WHERE p.customer_id = '".$_SESSION['login_user_id']."' GROUP BY p.project_name;";
        $result = $project->select($sql);

        $data = array();

        if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            while($row = $result->fetch_assoc()) {
                $data[] = array(
                    "project_name" => $row["project_name"],
                    "estimated_activities" => $row["estimated_activities"],
                    "actual_activities" => $row["actual_activities"]
                );
            }
        }


        // Encode data as JSON and send it back to JavaScript
        echo json_encode($data);



    }
?>