<?php

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_record_btn'])) {
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $release_by = $_POST['release_by'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $created_by = "some_user"; // Replace with actual data, e.g., from session
    $modified_by = isset($_POST['modified_by']) ? $_POST['modified_by'] : "default_user"; // Replace as needed

    $image = $_FILES['image']['name'];
    $path = ".." . DIRECTORY_SEPARATOR . "uploads";
    if (!is_dir($path)) {
        mkdir($path, 0777, true); // Create the directory if it doesn't exist
    }
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    // Check if the route_number already exists
    $check_query = "SELECT * FROM record_unit_data WHERE route_number = ?";
    $stmt_check = $con->prepare($check_query);
    $stmt_check->bind_param("s", $route_number);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Route number already exists, handle error
        redirect("add-record.php", "Route number already exists");
    } else {
        // Proceed with file validation and insert
        if (!empty($image)) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($image_ext, $allowed_extensions)) {
                $mime_type = mime_content_type($_FILES['image']['tmp_name']);
                
                if (in_array($mime_type, $allowed_mime_types)) {
                    // Insert the new record
                    $insert_query = "INSERT INTO record_unit_data (route_number, record_type, source, subject_matter, action_unit, created_by, modified_by, release_by, status, remark, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    
                    $stmt = $con->prepare($insert_query);
                    if ($stmt) { // Proceed only if $stmt is prepared successfully
                        $stmt->bind_param("sssssssssss", $route_number, $record_type, $source, $subject_matter, $action_unit, $created_by, $modified_by, $release_by, $status, $remark, $filename);
                        if ($stmt->execute()) {
                            move_uploaded_file($_FILES['image']['tmp_name'], $path . DIRECTORY_SEPARATOR . $filename);
                            redirect("add-record.php?route_number=$route_number", "Record Added Successfully");
                        } else {
                            redirect("add-record.php", "Something Went Wrong With Display");
                        }
                        $stmt->close();
                    } else {
                        error_log("SQL Prepare Error: " . $con->error); // Log error if prepare failed
                        redirect("add-record.php", "Database Error: Could not prepare statement");
                    }
                } else {
                    redirect("add-record.php", "Invalid MIME Type");
                }
            } else {
                redirect("add-record.php", "Invalid File Extension");
            }
        } else {
            redirect("create-record.php", "No File Uploaded");
        }
    }
    $stmt_check->close();
}
else if(isset($_POST['update_record_btn']))
{
    $record_route_number = $_POST['record_route_number'];
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $release_by = $_POST['release_by'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    //$created_at = $_POST['created_at'];

    $new_image = $_FILES['image']['name'];
    $old_captured_image = $_POST['old_captured_image'];
    
    if($new_image != "")
    {
        $update_filename = $new_image;
        $image_exit = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_exit;
    }
    else
    {
        $update_filename = $old_captured_image;
    }
    $path = ".." .DIRECTORY_SEPARATOR . "uploads";
        
        $update_query = "UPDATE record_unit_data SET route_number='$route_number', record_type='$record_type', source='$source', subject_matter='$subject_matter', action_unit='$action_unit', release_by='$release_by', status='$status', remark='$remark', image='$update_filename' WHERE route_number='$record_route_number' ";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
            if($_FILES['image']['name'] != "")
            {
                move_uploaded_file($_FILES['image']['tmp_name'], $path .'/'. $update_filename);
                if(file_exists("../uploads/".$old_captured_image))
                {
                    unlink("../uploads/".$old_captured_image);
                }
            }
            redirect("edit-record.php?route_number=$record_route_number", "Record Updated Successfully");
        }
        
        {
            redirect("edit-record.php?route_number=$record_route_number", "Something Went Wrong");
        }
        
}
else if(isset($_POST['delete_record_btn']))
{
    $record_route_number = mysqli_real_escape_string($con, $_POST['record_route_number']);

    $record_query = "SELECT * FROM record_unit_data WHERE route_number='route_number' ";
    $record_query_run = mysqli_query($con, $record_query);
    $record_data = mysqli_fetch_array($record_query_run);
    $image = $record_data['image'];

    $delete_query = "DELETE FROM record_unit_data WHERE route_number='$record_route_number' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        redirect("record.php", "Record Deleted Successfully");
        //echo 200;
    }
    else{
        redirect("record.php", "Something went wrong ");
        //echo 500;
    }
    $stmt->close();
}
?>