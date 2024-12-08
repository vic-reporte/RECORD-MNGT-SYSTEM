<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');
?>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">
                    <h4>Add User 
                        <a href="users.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mb-2">First Name:</label>
                                <input type="text" name="first_name" placeholder="Enter First Name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Last Name:</label>
                                <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Email:</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Password:</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Phone Number:</label>
                                <input type="tel" name="phone_num" placeholder="Enter Phone Number" class="form-control" patter="[0-9]{11}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Role:</label>
                                <select name="role_as" class="form-control" required>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info mt-3" name="add_users_btn" >Save User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>