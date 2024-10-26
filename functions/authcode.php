<?php

session_start();
include('../config/dbcon.php');
include('myfunctions.php');


if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Check if email is already registered
    $check_email_query = "SELECT email FROM users WHERE email= '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email is already registered";
        header('Location: ../register.php');
    }
    else
    {

    if($password == $cpassword)
    {
        //Insert user data
        $insert_query = "INSERT INTO users (name, email, phone_num, password) VALUES ('$name', '$email', '$phone_num', '$password')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['message'] = "Registered Successfully";
            header('Location: ../login.php');
        }
        else
        {
            $_SESSION['message'] = "Something went wrong";
            header('Location: ../register.php');
        }
    }
    else
    {
        $_SESSION['message'] = "Passwords do not match";
        header('Location: ../register.php');
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
            redirect("../admin/index-dashboard.php", "Welcome To Dashboard");
        }
        else
        {
            
            redirect("../index.php", "Login Successfully"); 
        }
        
    }
    else
    {
        redirect("../index.php", "Invalid Credentials"); 
    }
}
?>