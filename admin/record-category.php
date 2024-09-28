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
                                <label for="">Route Number:</label>
                                <input type="text" name="route_number" placeholder="Enter Route Number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Record Type:</label>
                                <input type="text" name="record_type" placeholder="Enter Record Type" class="form-control">
                            </div>
                            <div class="dropdown-column">
                                <label for="dropdown1">Source:</label>
                                <select id="dropdown1" name="dropdown1">
                                    <option value="SGOD">SGOD</option>
                                    <option value="Record Unit">Record Unit</option>
                                    <option value="Admin Unit">Admin Unit</option>
                                    <option value="Personnel Unit">Personnel Unit</option>
                                    <option value="Accounting Unit">Accounting Unit</option>
                                    <option value="Cash Unit">Cash Unit</option>
                                    <option value="CID">CID</option>
                                    <option value="SDS">SDS</option>
                                    <option value="ASDS">ASDS</option>
                                    <option value="ICT">ICT</option>
                                    <option value="Budget Unit">Budget Unit</option>
                                    <option value="Health Unit">Health Unit</option>
                                </select>
                            </div>
                            <div class="dropdown-column">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Source
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">SGOD</a></li>
                                    <li><a class="dropdown-item" href="#">Record Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Personel Unit</a></li>
                                </ul>
                            </div>
                            <div class="mb-2 mt-2">
                                <label for="">Subject Matter:</label>
                                <textarea class="form-control" rows="3" id="comment" name="text"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Action Unit:</label>
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