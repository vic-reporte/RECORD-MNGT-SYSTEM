<?php

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');
if(isset($_POST['record_category_btn']))
{
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $categ_query = "INSERT INTO record_category (route_name, record_type, source, subject_matter, action_unit, status, remark, image)
    VALUES ('$route_name', '$record_type', '$source', '$subject_matter', '$action_unit', '$status', '$remark','$filename')";

    $categ_query_run = mysqli_query($con, $categ_query);

    if($categ_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("record-category.php", "Record Added Successfully");
    }
    else
    {
        redirect("record-category.php", "Something Went Wrong");
    }
}

?>