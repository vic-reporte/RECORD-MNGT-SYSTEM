<?php

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_record_category_btn'])) {
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $release_by = $_POST['release_by'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $image = $_FILES['image']['name'];
    $path = "..".DIRECTORY_SEPARATOR. "uploads";

    $iamge_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    // Check if the route_number already exists
    $check_query = "SELECT * FROM record_unit_data WHERE route_number = ?";
    $stmt_check = $con->prepare($check_query);
    $stmt_check->bind_param("s", $route_number);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Route number already exists, handle error
        redirect("add-record-category.php", "Route number already exists");
    } else {
        // Proceed with file validation and insert
        if (!empty($image)) {
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($image_ext, $allowed_extensions)) {
                $filename = time() . '.' . $image_ext;

                // Insert the new record
                $insert_query = "INSERT INTO record_unit_data (route_number, record_type, source, subject_matter, action_unit, release_by, status, remark, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($insert_query);
                $stmt->bind_param("sssssssss", $route_number, $record_type, $source, $subject_matter, $action_unit, $release_by, $status, $remark, $filename);

                if ($stmt->execute()) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . DIRECTORY_SEPARATOR . $update_filename);
                    redirect("add-record-category.php", "Record Added Successfully");
                } else {
                    redirect("add-record-category.php", "Something Went Wrong With Display");
                }
                $stmt->close();
            } else {
                redirect("add-record-category.php", "Invalid File Type");
            }
        } else {
            redirect("add-record-category.php", "No File Uploaded");
        }
    }
}
else if(isset($_POST['update_category_btn']))
{
    $category_route_number = $_POST['category_route_number'];
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $release_by = $_POST['release_by'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

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
        
        $update_query = "UPDATE record_unit_data SET route_number='$route_number', record_type='$record_type', source='$source', subject_matter='$subject_matter', action_unit='$action_uint', release_by='$release_by', status='$status', remark='$remark', image='$update_filename' WHERE route_number='$category_route_number' ";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
            if($_FILES['image']['route_number'] != "")
            {
                move_uploaded_file($_FILES['image']['tmp_name'], $path .'/'. $update_filename);
                if(file_exists("../uploads/".$old_captured_image))
                {
                    unlink("../uploads/".$old_captured_image);
                }
            }
            redirect("edit-category.php?route_number=$category_route_number", "Category Updated Successfully");
        }
        
        {
            redirect("edit-category.php?route_number=$category_route_number", "Something Went Wrong");
        }
        
}
else if(isset($_POST['delete_category_btn']))
{
    $category_route_number = mysqli_real_escape_string($con, $_POST['category_route_number']);

    $delete_query = "DELETE FROM record_unit_data WHERE route_number='$category_route_number' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        redirect("add-record-category.php", "Category Deleted Successfully");
    }
    else{
        redirect("add-record-category.php", "Something went wrong ");
    }
    $stmt->close();
}

?>