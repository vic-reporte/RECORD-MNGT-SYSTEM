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
                            <div class="col-md-2">
                                <label for="">Route Number:</label>
                                <input type="text" name="route_number" placeholder="Enter Route Number" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="select">Record Type</label>
                                <select class="form-select" id="sel1" name="sellist1">
                                    <option>APPLICATION FOR GOV'T</option>
                                    <option>PERMIT</option>
                                    <option>APPLICATION/PROMOTION</option>
                                    <option>APPOINTMENT</option>
                                    <option>BILLS</option>
                                    <option>BOND</option>
                                    <option>BUDGET</option>
                                    <option>REQUIREMENT</option>
                                    <option>CEDULA</option>
                                    <option>CERTIFICATION</option>
                                    <option>CHANGE OF NAME</option>
                                    <option>CLEARANCE</option>
                                    <option>COMPLAINT LETTER</option>
                                    <option>CONFIDENTIAL</option>
                                    <option>CORRECTION OF ENTRIES</option>
                                    <option>DIPLOMA</option>
                                    <option>EMAIL ENDORSEMENT</option>
                                    <option>ERF</option>
                                    <option>FORM 4</option>
                                    <option>FORM 6</option>
                                    <option>FORM 7</option>
                                    <option>GAD ACCOMPLISHMENT</option>
                                    <option>GAD PLAN/BUDGET</option>
                                    <option>INVITATIONAL</option>
                                    <option>IOT</option>
                                    <option>IPCRF/OPCRF</option>
                                    <option>JOB ORDER CONTRACT</option>
                                    <option>LETTER</option>
                                    <option>LOCATOR SLIP</option>
                                    <option>MATERNITY</option>
                                    <option>MEMO/ISSUANCES</option>
                                    <option>MOA</option>
                                    <option>MONETIZATION</option>
                                    <option>NOSA</option>
                                    <option>NOSI</option>
                                    <option>PERMIT TO STUDY</option>
                                    <option>PERMIT TO TEACH</option>
                                    <option>PERTINENTS PAPERS</option>
                                    <option>PROPOSAL</option>
                                    <option>QUESTIONNAIRE</option>
                                    <option>RECLASSIFICATION</option>
                                    <option>RECOMMENDATION</option>
                                    <option>REPORT</option>
                                    <option>REQUEST</option>
                                    <option>REQUEST FOR TRANSFER</option>
                                    <option>REQUEST LETTER</option>
                                    <option>RESEARCH</option>
                                    <option>RESIGNATION</option>
                                    <option>RETIREMENT</option>
                                    <option>RETURN TO DUTY</option>
                                </select>
                            </div>
                            <div class="dropend">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Source
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Accounting Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Admin</a></li>
                                    <li><a class="dropdown-item" href="#">ASDS</a></li>
                                    <li><a class="dropdown-item" href="#">Budget Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Cash Unit</a></li>
                                    <li><a class="dropdown-item" href="#">CID</a></li>
                                    <li><a class="dropdown-item" href="#">Health Unit</a></li>
                                    <li><a class="dropdown-item" href="#">ICT</a></li>
                                    <li><a class="dropdown-item" href="#">Personel Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Record Unit</a></li>
                                    <li><a class="dropdown-item" href="#">SDS</a></li>
                                    <li><a class="dropdown-item" href="#">SGOD</a></li>
                                    <li><a class="dropdown-item" href="#">Supply Unit</a></li>
                                </ul>
                            </div>
                            <div class="mb-2 mt-2">
                                <label for="">Subject Matter:</label>
                                <textarea class="form-control" rows="2" id="comment" name="text"></textarea>
                            </div>
                            <div class="dropend">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Action Uint
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Accounting Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Admin</a></li>
                                    <li><a class="dropdown-item" href="#">ASDS</a></li>
                                    <li><a class="dropdown-item" href="#">Budget Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Cash Unit</a></li>
                                    <li><a class="dropdown-item" href="#">CID</a></li>
                                    <li><a class="dropdown-item" href="#">Health Unit</a></li>
                                    <li><a class="dropdown-item" href="#">ICT</a></li>
                                    <li><a class="dropdown-item" href="#">Personel Unit</a></li>
                                    <li><a class="dropdown-item" href="#">Record Unit</a></li>
                                    <li><a class="dropdown-item" href="#">SDS</a></li>
                                    <li><a class="dropdown-item" href="#">SGOD</a></li>
                                    <li><a class="dropdown-item" href="#">Supply Unit</a></li>
                                </ul>
                            </div>
                            <!--div class="col-md-6">
                                <label for="">Action Unit:</label>
                                <input type="text" name="action_unit" placeholder="Enter Action Unit" class="form-control">
                            </!--div-->
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