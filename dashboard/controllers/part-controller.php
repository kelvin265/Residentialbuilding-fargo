<?php
    include_once "../classes/part.php";
    // adding a new Part
    if(isset($_POST["new_part_name"])){
        extract($_POST);
        $part = new Part();
        $part->name = $new_part_name;
        $part->price = $price;
        $part->description = $description;

        $part->newPart();
    }

     // deleting a Part
     if(isset($_GET["delete_id"])){
        extract($_GET);
        $part = new Part();
        $part->part_id = $delete_id;
        $part->deletePart();

        header("location:../manage-parts.php");

    }

?>