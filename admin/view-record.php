<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <?php
            // This function is to check the route number if set to the url or not and get the all record category through route number
            if(isset($_GET['route_number']))
            {
                $route_number = $_GET['route_number'];
                $record = getByroute_number("All Record", $route_number);

                if(mysqli_num_rows($record) > 0 )
                {
                    $data = mysqli_fetch_array($record);
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>View Record 
                                <a href="record.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="hidden" name="record_route_number" value="<?= $data['route_number'] ?>">
                                        <label for="">Route Number:</label>
                                        <input type="text" name="route_number" value="<?= $data['route_number'] ?>" placeholder="Enter Route Number" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="select">Record Type:</label>
                                        <select class="form-select" name="record_type" class="control-form mb-2">
                                            <option <?= ($data['record_type'] == 'APPLICATION/PROMOTION') ? 'selected' : '' ?>>APPLICATION/PROMOTION</option>
                                            <option <?= ($data['record_type'] == 'PERMIT') ? 'selected' : '' ?>>PERMIT</option>
                                            <option <?= ($data['record_type'] == 'APPOINTMENT') ? 'selected' : '' ?>>APPOINTMENT</option>
                                            <option <?= ($data['record_type'] == 'BILLS') ? 'selected' : '' ?>>BILLS</option>
                                            <option <?= ($data['record_type'] == 'BOND') ? 'selected' : '' ?>>BOND</option>
                                            <option <?= ($data['record_type'] == 'BUDGET') ? 'selected' : '' ?>>BUDGET</option>
                                            <option <?= ($data['record_type'] == 'REQUIREMENT') ? 'selected' : '' ?>>REQUIREMENT</option>
                                            <option <?= ($data['record_type'] == 'CEDULA') ? 'selected' : '' ?>>CEDULA</option>
                                            <option <?= ($data['record_type'] == 'CERTIFICATION') ? 'selected' : '' ?>>CERTIFICATION</option>
                                            <option <?= ($data['record_type'] == 'CHANGE OF NAME') ? 'selected' : '' ?>>CHANGE OF NAME</option>
                                            <option <?= ($data['record_type'] == 'CLEARANCE') ? 'selected' : '' ?>>CLEARANCE</option>
                                            <option <?= ($data['record_type'] == 'COMPLAINT LETTER') ? 'selected' : '' ?>>COMPLAINT LETTER</option>
                                            <option <?= ($data['record_type'] == 'CONFIDENTIAL') ? 'selected' : '' ?>>CONFIDENTIAL</option>
                                            <option <?= ($data['record_type'] == 'CORRECTION OF ENTRIES') ? 'selected' : '' ?>>CORRECTION OF ENTRIES</option>
                                            <option <?= ($data['record_type'] == 'DIPLOMA') ? 'selected' : '' ?>>DIPLOMA</option>
                                            <option <?= ($data['record_type'] == 'EMAIL ENDORSEMENT') ? 'selected' : '' ?>>EMAIL ENDORSEMENT</option>
                                            <option <?= ($data['record_type'] == 'ERF') ? 'selected' : '' ?>>ERF</option>
                                            <option <?= ($data['record_type'] == 'FORM 4') ? 'selected' : '' ?>>FORM 4</option>
                                            <option <?= ($data['record_type'] == 'FORM 6') ? 'selected' : '' ?>>FORM 6</option>
                                            <option <?= ($data['record_type'] == 'FORM 7') ? 'selected' : '' ?>>FORM 7</option>
                                            <option <?= ($data['record_type'] == 'GAD ACCOMPLISHMENT') ? 'selected' : '' ?>>GAD ACCOMPLISHMENT</option>
                                            <option <?= ($data['record_type'] == 'GAD PLAN/BUDGET') ? 'selected' : '' ?>>GAD PLAN/BUDGET</option>
                                            <option <?= ($data['record_type'] == 'INVITATIONAL') ? 'selected' : '' ?>>INVITATIONAL</option>
                                            <option <?= ($data['record_type'] == 'IOT') ? 'selected' : '' ?>>IOT</option>
                                            <option <?= ($data['record_type'] == 'IPCRF/OPCRF') ? 'selected' : '' ?>>IPCRF/OPCRF</option>
                                            <option <?= ($data['record_type'] == 'JOB ORDER CONTRACT') ? 'selected' : '' ?>>JOB ORDER CONTRACT</option>
                                            <option <?= ($data['record_type'] == 'LETTER') ? 'selected' : '' ?>>LETTER</option>
                                            <option <?= ($data['record_type'] == 'LOCATOR SLIP') ? 'selected' : '' ?>>LOCATOR SLIP</option>
                                            <option <?= ($data['record_type'] == 'MATERNITY') ? 'selected' : '' ?>>MATERNITY</option>
                                            <option <?= ($data['record_type'] == 'MEMO/ISSUANCES') ? 'selected' : '' ?>>MEMO/ISSUANCES</option>
                                            <option <?= ($data['record_type'] == 'MOA') ? 'selected' : '' ?>>MOA</option>
                                            <option <?= ($data['record_type'] == 'MONETIZATION') ? 'selected' : '' ?>>MONETIZATION</option>
                                            <option <?= ($data['record_type'] == 'NOSA') ? 'selected' : '' ?>>NOSA</option>
                                            <option <?= ($data['record_type'] == 'NOSI') ? 'selected' : '' ?>>NOSI</option>
                                            <option <?= ($data['record_type'] == 'PERMIT TO STUDY') ? 'selected' : '' ?>>PERMIT TO STUDY</option>
                                            <option <?= ($data['record_type'] == 'PERMIT TO TEACH') ? 'selected' : '' ?>>PERMIT TO TEACH</option>
                                            <option <?= ($data['record_type'] == 'PERTINENTS PAPERS') ? 'selected' : '' ?>>PERTINENTS PAPERS</option>
                                            <option <?= ($data['record_type'] == 'PROPOSAL') ? 'selected' : '' ?>>PROPOSAL</option>
                                            <option <?= ($data['record_type'] == 'QUESTIONNAIRE') ? 'selected' : '' ?>>QUESTIONNAIRE</option>
                                            <option <?= ($data['record_type'] == 'RECLASSIFICATION') ? 'selected' : '' ?>>RECLASSIFICATION</option>
                                            <option <?= ($data['record_type'] == 'RECOMMENDATION') ? 'selected' : '' ?>>RECOMMENDATION</option>
                                            <option <?= ($data['record_type'] == 'REPORT') ? 'selected' : '' ?>>REPORT</option>
                                            <option <?= ($data['record_type'] == 'REQUEST') ? 'selected' : '' ?>>REQUEST</option>
                                            <option <?= ($data['record_type'] == 'REQUEST FOR TRANSFER') ? 'selected' : '' ?>>REQUEST FOR TRANSFER</option>
                                            <option <?= ($data['record_type'] == 'REQUEST LETTER') ? 'selected' : '' ?>>REQUEST LETTER</option>
                                            <option <?= ($data['record_type'] == 'RESEARCH') ? 'selected' : '' ?>>RESEARCH</option>
                                            <option <?= ($data['record_type'] == 'RESIGNATION') ? 'selected' : '' ?>>RESIGNATION</option>
                                            <option <?= ($data['record_type'] == 'RETIREMENT') ? 'selected' : '' ?>>RETIREMENT</option>
                                            <option <?= ($data['record_type'] == 'RETURN TO DUTY') ? 'selected' : '' ?>>RETURN TO DUTY</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="select">Source:</label>
                                        <select class="form-select" name="source" class="control-form mb-2">
                                            <option <?= ($data['source'] == 'Accounting Unit') ? 'selected' : '' ?>>Accounting Unit</option>
                                            <option <?= ($data['source'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                                            <option <?= ($data['source'] == 'ASDS') ? 'selected' : '' ?>>ASDS</option>
                                            <option <?= ($data['source'] == 'Budget Unit') ? 'selected' : '' ?>>Budget Unit</option>
                                            <option <?= ($data['source'] == 'Cash Unit') ? 'selected' : '' ?>>Cash Unit</option>
                                            <option <?= ($data['source'] == 'CID') ? 'selected' : '' ?>>CID</option>
                                            <option <?= ($data['source'] == 'Health') ? 'selected' : '' ?>>Health</option>
                                            <option <?= ($data['source'] == 'ICT') ? 'selected' : '' ?>>ICT</option>
                                            <option <?= ($data['source'] == 'Legal Unit') ? 'selected' : '' ?>>Legal Unit</option>
                                            <option <?= ($data['source'] == 'Personnel Unit') ? 'selected' : '' ?>>Personnel Unit</option>
                                            <option <?= ($data['source'] == 'Record Unit') ? 'selected' : '' ?>>Record Unit</option>
                                            <option <?= ($data['source'] == 'SDS') ? 'selected' : '' ?>>SDS</option>
                                            <option <?= ($data['source'] == 'SGOD') ? 'selected' : '' ?>>SGOD</option>
                                            <option <?= ($data['source'] == 'Supply Unit') ? 'selected' : '' ?>>Supply Unit</option>  
                                        </select>
                                    </div>
                                    <div class="mb-2 mt-2">
                                        <label for="">Subject Matter:</label>
                                        <textarea class="form-control" rows="2" name="subject_matter"><?= $data['subject_matter'] ?> </textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="select">Action Unit:</label>
                                        <select class="form-select text-center" name="action_unit" class="control-form mb-2">
                                        <option <?= ($data['source'] == 'Accounting Unit') ? 'selected' : '' ?>>Accounting Unit</option>
                                            <option <?= ($data['action_unit'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                                            <option <?= ($data['action_unit'] == 'ASDS') ? 'selected' : '' ?>>ASDS</option>
                                            <option <?= ($data['action_unit'] == 'Budget Unit') ? 'selected' : '' ?>>Budget Unit</option>
                                            <option <?= ($data['action_unit'] == 'Cash Unit') ? 'selected' : '' ?>>Cash Unit</option>
                                            <option <?= ($data['action_unit'] == 'CID') ? 'selected' : '' ?>>CID</option>
                                            <option <?= ($data['action_unit'] == 'Health') ? 'selected' : '' ?>>Health</option>
                                            <option <?= ($data['action_unit'] == 'ICT') ? 'selected' : '' ?>>ICT</option>
                                            <option <?= ($data['action_unit'] == 'Legal Unit') ? 'selected' : '' ?>>Legal Unit</option>
                                            <option <?= ($data['action_unit'] == 'Personnel Unit') ? 'selected' : '' ?>>Personnel Unit</option>
                                            <option <?= ($data['action_unit'] == 'Record Unit') ? 'selected' : '' ?>>Record Unit</option>
                                            <option <?= ($data['action_unit'] == 'SDS') ? 'selected' : '' ?>>SDS</option>
                                            <option <?= ($data['action_unit'] == 'SGOD') ? 'selected' : '' ?>>SGOD</option>
                                            <option <?= ($data['action_unit'] == 'Supply Unit') ? 'selected' : '' ?>>Supply Unit</option>  
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-4" style="display:inline-block;">
                                        <label for="select">Release By:</label>
                                        <select class="form-select"  name="release_by" class="control-form mb-2">
                                            <option>User 1</option>
                                            <option <?= ($data['release_by'] == 'User 1') ? 'selected' : '' ?>>User 1</option>
                                            <option <?= ($data['release_by'] == 'User 2') ? 'selected' : '' ?>>User 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="display:inline-block;">
                                        <label for="select">Status:</label>
                                        <select class="form-select text-center" name="status" class="control-form mb-2" >
                                            <option <?= ($data['status'] == 'Release') ? 'selected' : '' ?>>Release</option>
                                            <option <?= ($data['status'] == 'For Release') ? 'selected' : '' ?>>For Release</option>
                                            <option <?= ($data['status'] == 'Cancelled') ? 'selected' : '' ?>>Cancelled</option>
                                            <option <?= ($data['status'] == 'Filed') ? 'selected' : '' ?>>Filed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="display:inline-block;">
                                        <label for="select">Remark:</label>
                                        <select class="form-select" name="remark" class="control-form mb-2">
                                            <option <?= ($data['remark'] == 'Release') ? 'selected' : '' ?>>Release</option>
                                            <option <?= ($data['remark'] == 'Cancelled') ? 'selected' : '' ?>>Cancelled</option>
                                            <option <?= ($data['remark'] == 'Filed') ? 'selected' : '' ?>>Filed</option>
                                        </select>
                                    </div>

                                    <!--div class="col-md-2" style="display:inline-block;">
                                    <label for="">Created:</label>
                                    </div-->
                                    <div class="col-md-4">
                                        <label for="">Captured Image</label>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_captured_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data ['image'] ?>" alt="<?= $data ['image']; ?>" style="width:50px; height: auto;">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-sm" name="update_record_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
                else
                {
                    echo "Data Record Not Found";
                }
            }
            else
            {
                echo "Route Number missing from url";
            }
                ?>
        </div>
    </div>
</div>
<!--div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!?php
                //if(isset($_GET['route_number']))
                {
                ?>
                <div class="card-header">
                    <h4>View Record 
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
                <!?php
                 }
                 else
                 {
                    echo "Route nmber missing from url";
                 }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>