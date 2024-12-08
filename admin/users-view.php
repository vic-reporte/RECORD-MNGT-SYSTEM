<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');
?>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Prepare and execute the query to fetch single row by route_number
                $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>User Details
                                <a href="users.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>ID:</strong> <?= htmlspecialchars($row['id']); ?></p>
                                        <p><strong>First Name:</strong> <?= htmlspecialchars($row['first_name']); ?></p>
                                        <p><strong>Last Name:</strong> <?= htmlspecialchars($row['last_name']); ?></p>
                                        <p><strong>Email:</strong> <?= htmlspecialchars($row['email']); ?></p>
                                        <p><strong>Password:</strong> <?= htmlspecialchars($row['password']); ?></p>
                                        <p><strong>Phone Number:</strong> <?= htmlspecialchars($row['phone_num']); ?></p>
                                        <p><strong>Role As:</strong> <?= htmlspecialchars($row['role_as']); ?></p>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
            <?php
                } else {
                    echo "<div class='alert alert-danger'>No user found.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>User missing from URL.</div>";
            }     
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
