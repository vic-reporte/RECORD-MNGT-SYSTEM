<?php 
    session_start();
    include('config/dbcon.php');

function getByroute_number($table, $route_number)
{
    global $con; // Ensuring that the $con variable is accessible inside the function
    $query = "SELECT * FROM  record_unit_data WHERE route_number='$route_number'";
    return $query_run = mysqli_query($con, $query);
}
function getAllRecord($record_unit_data)
{
    global $con; // Ensure $con is the database connection
    $query = "SELECT * FROM record_unit_data"; 
    $result = mysqli_query($con, $query);
    
    // Check for results and return as an associative array
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
    return [];
     }
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>