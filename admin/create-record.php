<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Record 
                        <a href="record.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="record.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mb-0">Route Number:</label>
                                <input type="text" name="route_number" placeholder="Enter Route Number" class="form-control mb-2">
                            </div>
                            <div class="col-md-4">
                                <label for="select">Record Type:</label>
                                <select class="form-select mb-2" name="record_type">
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
                            <div class="col-md-4">
                                <label for="select">Source:</label>
                                <select class="form-select mb-2" name="source">
                                <option>Accounting Unit</option>
                                    <option>Admin</option>
                                    <option>ASDS</option>
                                    <option>Budget Unit</option>
                                    <option>Cash Unit</option>
                                    <option>CID</option>
                                    <option>Health</option>
                                    <option>ICT</option>
                                    <option>Legal Unit</option>
                                    <option>Personnel Unit</option>
                                    <option>Record Unit</option>
                                    <option>SDS</option>
                                    <option>SGOD</option>
                                    <option>Supply Unit</option>  
                                </select>
                            </div>
                            <div class="mb-3 mt-2">
                                <label for="">Subject Matter:</label>
                                <textarea class="form-control mb-2" rows="2" name="subject_matter"></textarea>
                            </div>
                            <div class="col-md-3">
                                <label for="select">Action Unit:</label>
                                <select class="form-select mb-2" name="action_unit">
                                    <option>Accounting Unit</option>
                                    <option>Admin</option>
                                    <option>ASDS</option>
                                    <option>Budget Unit</option>
                                    <option>Cash Unit</option>
                                    <option>CID</option>
                                    <option>Health</option>
                                    <option>ICT</option>
                                    <option>Legal Unit</option>
                                    <option>Personnel Unit</option>
                                    <option>Record Unit</option>
                                    <option>SDS</option>
                                    <option>SGOD</option>
                                    <option>Supply Unit</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <label for="select">Release By:</label>
                                <select class="form-select mb-2" name="release_by">
                                    <option>User 1</option>
                                    <option>User 2</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-43>
                                <label for="select">Status:</label>
                                <select class="form-select mb-2" name="status">
                                    <option>Release</option>
                                    <option>For Release</option>
                                    <option>Cancelled</option>
                                    <option>Filed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="select">Remark:</label>
                                <select class="form-select mb-2" name="remark">
                                    <option>Release</option>
                                    <option>Cancelled</option>
                                    <option>Filed</option>
                                </select>
                            </div>
                            <div class="col-md-4 ">
                                <label for="">Captured Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="save" class="btn btn-info mt-3">Save Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>