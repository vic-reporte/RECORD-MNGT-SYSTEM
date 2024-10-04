<?php

include('../config/dbcon.php');
function getAll($table)
{
    global $con; // Ensuring that the $con variable is accessible inside the function
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>