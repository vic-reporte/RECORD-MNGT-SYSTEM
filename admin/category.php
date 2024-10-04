<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Record Unit Data </h4>
              </div>
              <div class="card-body">
                <table class="table table-boardered">
                   <thead>
                      <tr>
                    <th>Route Number</th>
                    <th>Record Type</th>
                    <th>Source</th>
                    <th>Subject Matter</th>
                    <th>Action Unit</th>
                    <th>Status</th>
                    <th>Remark</th>
                    <th>Edit</th>
                      </tr>
                   </thead>
                    <tbody>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                    </tbody>
                </table>
              </div>  
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>