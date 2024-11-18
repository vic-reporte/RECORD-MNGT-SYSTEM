<?php
include('includes/header.php');
include('functions/user-functions.php');

?>
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['route_number'])) {
                $route_number = $_GET['route_number'];
                
                // Prepare and execute the query to fetch single row by route_number
                $stmt = $con->prepare("SELECT * FROM record_unit_data WHERE route_number = ?");
                $stmt->bind_param("s", $route_number);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Record Details
                                <a href="record.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Route Number:</strong> <?= htmlspecialchars($row['route_number']); ?></p>
                                        <p><strong>Record Type:</strong> <?= htmlspecialchars($row['record_type']); ?></p>
                                        <p><strong>Source:</strong> <?= htmlspecialchars($row['source']); ?></p>
                                        <p><strong>Subject Matter:</strong> <?= htmlspecialchars($row['subject_matter']); ?></p>
                                        <p><strong>Action Unit:</strong> <?= htmlspecialchars($row['action_unit']); ?></p>
                                        <p><strong>Created By:</strong> <?= htmlspecialchars($row['created_by']); ?></p>
                                        <p><strong>Modified By:</strong> <?= htmlspecialchars($row['modified_by']); ?></p>
                                        <p><strong>Release By:</strong> <?= htmlspecialchars($row['release_by']); ?></p>
                                        <p><strong>Release At:</strong> <?= htmlspecialchars($row['release_at']); ?></p>
                                        <p><strong>Status:</strong> <?= htmlspecialchars($row['status']); ?></p>
                                        <p><strong>Remark:</strong> <?= htmlspecialchars($row['remark']); ?></p>
                                        <p><strong>Created At:</strong> <?= htmlspecialchars($row['created_at']); ?></p>
                                        <p><strong>Updated At:</strong> <?= htmlspecialchars($row['updated_at']); ?></p>
                                        <?php if (!empty($row['image'])) { ?>
                                            <p><strong>Claimer Image:</strong></p>
                                            <img src="../uploads/<?= htmlspecialchars($row['image']); ?>" alt="Captured Image" style="width:100px; height:auto;">
                                            <input type="hidden" name="old_captured_image" value="<?= htmlspecialchars($row['image']); ?>">
                                        <?php } else { ?>
                                            <p><strong>Claimer Image:</strong> No image available.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "<div class='alert alert-danger'>No record found.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Route Number missing from URL.</div>";
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>