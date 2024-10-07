<?php

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['record_category_btn'])) {
    $route_number = $_POST['route_number'];
    $record_type = $_POST['record_type'];
    $source = $_POST['source'];
    $subject_matter = $_POST['subject_matter'];
    $action_unit = $_POST['action_unit'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $image = $_FILES['image']['name'];
    $path = "../uploads";

    // Check if the route_number already exists
    $check_query = "SELECT * FROM record_unit_data WHERE route_number = ?";
    $stmt_check = $con->prepare($check_query);
    $stmt_check->bind_param("s", $route_number);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Route number already exists, handle error
        redirect("record-category.php", "Route number already exists");
    } else {
        // Proceed with file validation and insert
        if (!empty($image)) {
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($image_ext, $allowed_extensions)) {
                $filename = time() . '.' . $image_ext;

                // Insert the new record
                $insert_query = "INSERT INTO record_unit_data (route_number, record_type, source, subject_matter, action_unit, status, remark, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($insert_query);
                $stmt->bind_param("ssssssss", $route_number, $record_type, $source, $subject_matter, $action_unit, $status, $remark, $filename);

                if ($stmt->execute()) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                    redirect("record-category.php", "Record Added Successfully");
                } else {
                    redirect("record-category.php", "Something Went Wrong");
                }
                $stmt->close();
            } else {
                redirect("record-category.php", "Invalid File Type");
            }
        } else {
            redirect("record-category.php", "No File Uploaded");
        }
    }
}
?>