<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
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
                                <label class="mb-2">ID:</label>
                                <input type="text" name="id" placeholder="Enter ID" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Role As:</label>
                                <input type="text" name="role_as" placeholder="Enter Role As" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">First Name:</label>
                                <input type="text" name="first_name" placeholder="Enter First Name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Last Name:</label>
                                <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="mb-2">Email:</label>
                                <input type="text" name="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="mb-2">Password:</label>
                                <input type="text" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="mb-2">Phone Number:</label>
                                <input type="text" name="phone_num" placeholder="Enter Phone Number" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info mt-3" name="add_users_btn" >Save Users</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>