<?php

include('../config/dbcon.php');
function getAll($table)
{
    global $con; // Ensuring that the $con variable is accessible inside the function
    $query = "SELECT * FROM record_unit_data";
    return $query_run = mysqli_query($con, $query);
}
function getByroute_number($table, $route_number)
{
    global $con; // Ensuring that the $con variable is accessible inside the function
    $query = "SELECT * FROM  record_unit_data WHERE route_number='$route_number'";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>