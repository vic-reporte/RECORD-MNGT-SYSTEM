<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h4>Record Unit Data </h4>
              </div>
              <div class="card-body">
                <table class="table table-secondary table-hover">
                   <thead>
                      <tr>
                          <th>Route Number</th>
                          <th>Record Type</th>
                          <th>Source</th>
                          <th>Subject Matter</th>
                          <th>Action Unit</th>
                          <th>Claim By</th>
                          <th>Status</th>
                          <th>Remark</th>
                          <th>Edit</th>
                      </tr>
                   </thead>
                    <tbody>
                      <?php
                          $category = getAll('Record Unit data');
                          if(!empty($category))
                          {
                            foreach($category as $item)
                            {
                                ?>
                                  <tr>
                                      <td> <?= $item ['route_number']; ?></td>
                                      <td> <?= $item ['record_type']; ?></td>
                                      <td> <?= $item ['source']; ?></td>
                                      <td> <?= $item ['subject_matter']; ?></td>
                                      <td> <?= $item ['action_unit']; ?></td>
                                      <td>
                                        <img src="../uploads/<?= $item ['image']; ?>" alt="<?= $item ['image']; ?>" style="width:50px; height: auto;">
                                      </td>
                                      <td> <?= $item ['status']; ?></td>
                                      <td> <?= $item ['remark']; ?></td>
                                      <td> 
                                        <a href="#" class="btn btn-primary btn-sm" >Edit</a>
                                      </td>
                                  </tr>
                                <?php
                            }
                          }
                          else
                          {
                              echo "<tr><td colspan='9'>No Records Found</td></tr>";
                          }
                        ?>
                    </tbody>
                </table>
              </div>  
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>