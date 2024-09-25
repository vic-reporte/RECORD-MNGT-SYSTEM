<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Record Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Route Number</label>
                                <input type="text" name="route_number" placeholder="Enter Route Number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Record Type</label>
                                <input type="text" name="record_type" placeholder="Enter Record Type" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Source</label>
                                <input type="text" name="source" placeholder="Enter Source" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Subject Matter</label>
                                <input type="textarea" name="subject_matter" rows="5" cols="20" placeholder="Enter Subject Matter" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Action Unit</label>
                                <input type="text" name="action_unit" placeholder="Enter Action Unit" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="text" name="status" placeholder="Enter Status" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Remark</label>
                                <input type="text" name="remark" placeholder="Enter Remark" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div clas="col-md-12">
                                <button type="submit" class="btn btn-primary" name="record_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>