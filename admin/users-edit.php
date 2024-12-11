<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');
?>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-14">
        <?php
            // This function is to check the route number if set to the url or not and get the all record category through route number
            if(isset($_GET['id']))
            {
                $id = mysqli_real_escape_string($con, $_GET['id']);
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                //if(mysqli_num_rows($users) > 0 )
                if ($result->num_rows > 0) {
                
                    //$data = mysqli_fetch_array($id);
                    $data = $result->fetch_assoc();
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit User 
                                <a href="users.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                    <input type="hidden" name="users" value="<?= htmlspecialchars($data['id']) ?>">
                                        <label class="mb-2">First Name:</label>
                                        <input type="text" name="first_name" value="<?= htmlspecialchars($data['first_name']) ?>" placeholder="Enter First Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-2">Last Name:</label>
                                        <input type="text" name="last_name"  value="<?= htmlspecialchars($data['last_name']) ?>" placeholder="Enter Last Name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-2">Email:</label>
                                        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" placeholder="Enter Email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-2">New Password:</label>
                                        <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-2">Phone Number:</label>
                                        <input type="tel" name="phone_num" value="<?= htmlspecialchars($data['phone_num']) ?>" placeholder="Enter Phone Number" class="form-control" patter="[0-9]{10-15}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-2">Role:</label>
                                        <select name="role_as" class="form-control" required>
                                            <option value="1" <?= $data['role_as'] == 1 ? 'selected' : ''; ?>>Admin</option>
                                            <option value="0" <?= $data['role_as'] == 1 ? 'selected' : ''; ?>>User</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info mt-3" name="update_users_btn" >Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
                else
                {
                    echo "<div class='alert alert-danger'>User ID not found.</div>";
                }
            }
            else
            {
                echo "<div class='alert alert-danger'>ID missing from URL.</div>";
            }
                ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>