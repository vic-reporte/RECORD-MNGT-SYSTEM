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
    
    //*Check if the route_number already exists*//
    $check_query = "SELECT * FROM record_unit_data WHERE route_number = ?";
    $stmt_check = $con->prepare($check_query);
    $stmt_check->bind_param("s", $route_number);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        //*Route number already exists, handle error*//
        redirect("add-record.php", "Route number already exists");
    } else {
        // Insert the new record//
        $insert_query = "INSERT INTO record_unit_data (route_number, record_type, source, subject_matter, action_unit) VALUES (?, ?, ?, ?, ?)";
         
        $stmt = $con->prepare($insert_query);
            if ($stmt) { //* Proceed only if $stmt is prepared successfully*//
            $stmt->bind_param("sssss", $route_number, $record_type, $source, $subject_matter, $action_unit);

            if ($stmt->execute()) {
                redirect("add-record.php?route_number=$route_number", "Record Added Successfully");
        } else {
            redirect("add-record.php", "Something Went Wrong With Display");
            }
            $stmt->close();
        } else {
            error_log("SQL Prepare Error: " . $con->error); // Log error if prepare failed
            redirect("add-record.php", "Database Error: Could not prepare statement");
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
if (isset($_POST['delete_record_btn'])) {
    $record_route_number = mysqli_real_escape_string($con, $_POST['record_route_number']);

    // Fetch record to delete associated image
    $record_query = "SELECT image FROM record_unit_data WHERE route_number = ?";
    $stmt = $con->prepare($record_query);
    $stmt->bind_param("s", $record_route_number);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($record_data = $result->fetch_assoc()) {
        $image = $record_data['image'];

        // Delete record
        $delete_query = "DELETE FROM record_unit_data WHERE route_number = ?";
        $stmt_delete = $con->prepare($delete_query);
        $stmt_delete->bind_param("s", $record_route_number);
        if ($stmt_delete->execute()) {
            if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
            redirect("record.php", "Record Deleted Successfully");
        } else {
            redirect("record.php", "Error deleting record");
        }
        $stmt_delete->close();
    } else {
        redirect("record.php", "Record not found");
    }
    $stmt->close();
}

    //USER DATA //
if (isset($_POST['add_user_btn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_num = $_POST['phone_num'];
    $role_as = $_POST['role_as'];
    
    //*Check if the email already exists*//
    $check_query = "SELECT email FROM users WHERE email = ?";
    $stmt_check = $con->prepare($check_query);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        //*Email already exists, handle error*//
        redirect("add-users.php", "Email already exists");
    } else {
        // Insert the email//
        $insert_query = "INSERT INTO users (first_name, last_name, email, password, phone_num, role_as) VALUES (?, ?, ?, ?, ?, ?)";
         
        $stmt = $con->prepare($insert_query);
            if ($stmt) { //* Proceed only if $stmt is prepared successfully*//
            $stmt->bind_param("sssssi", $first_name, $last_name, $email, $hashed_password, $phone_num, $role_as);

            if ($stmt->execute()) {
                redirect("add-users.php?email=$email", "User Added Successfully");
        } else {
            redirect("add-users.php", "Something Went Wrong With Display");
            }
            $stmt->close();
        } else {
            error_log("SQL Prepare Error: " . $con->error); // Log error if prepare failed
            redirect("add-users.php", "Database Error: Could not prepare statement");
        }   
    }
    $stmt_check->close();
}
?>