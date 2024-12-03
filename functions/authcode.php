<?php

session_start();
include('../config/dbcon.php');
include('myfunctions.php');


if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['first_name']);
    $name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phone_num = mysqli_real_escape_string($con, $_POST['phone_num']);
    // Check if email is already registered
    //$check_email_query = "SELECT email FROM users WHERE email= '$email' ";
    $check_email_query = "SELECT email FROM users WHERE email= ?";
    //$check_email_query_run = mysqli_query($con, $check_email_query);
    $stmt = mysqli_prepare($con, $check_email_query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //if(mysqli_num_rows($check_email_query_run) > 0)
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Email is already registered";
        header('Location: ../register.php');
        exit;
    } else {

    if($password == $cpassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //Insert user data
        $insert_query = "INSERT INTO users (first_name, last_name, email, password, cpassword, phone_num) VALUES (?, ?, ?, ?, ?, ?)";
        //$insert_query_run = mysqli_query($con, $insert_query);
        $stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssss', $first_name, $last_name, $email, $hashed_password, $phone_num);

        //if($insert_query_run)
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Registered Successfully";
            header('Location: ../login.php');
            exit;
        } else {
            $_SESSION['message'] = "Something went wrong while registering";
            header('Location: ../register.php');
            exit;
        }
    } else {
        $_SESSION['message'] = "Passwords do not match";
        header('Location: ../register.php');
        exit;
    }
    }
}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email= '$email' AND password= '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0 )
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata ['name'];
        $useremail = $userdata ['email'];
        $role_as = $userdata ['role_as'];

        $_SESSION['auth_user'] = ['name' => $username,'email' => $useremail];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1)
        {
            redirect("../admin/index-dashboard.php", "Hello Admin, Welcome To Dashboard");
        } else { 
            redirect("../index.php", "Login Successfully"); 
        }
        
    } else {
        redirect("../index.php", "Invalid Credentials"); 
    }
}
?>

