<?php
    include_once "../classes/material.php";
    // adding a new material
    if(isset($_POST["new_material_name"])){
        extract($_POST);
        $material = new Material();
        $material->material_name = $new_material_name;
        $material->price = $price;
        $material->description = $description;

        $material->newMaterial();
    }

     // deleting a material
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $material = new Material();
        $material->material_id = $delete_id;
        $material->deleteMaterial();

        header("location:../manage-materials.php");

    }

?>