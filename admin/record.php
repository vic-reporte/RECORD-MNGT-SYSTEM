<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-2 mt-0 mb-0">
    <div class="row ml-0">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header mt-0">
                <h2>Record Data 
                  <a href="create-record.php" class="btn btn-info float-end">Add Record</a>
                </h2>
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
                          <th>Release By</th>
                          <th>Claim By</th>
                          <th>Status</th>
                          <th>Remark</th>
                          <!--th>Create At</th-->
                          <th>Action</th>
                      </tr>
                   </thead>
                    <tbody>
                      <?php
                          $record = getAll('Record Data');
                          if(!empty($record))
                          {
                            foreach($record as $item)
                            {
                                ?>
                                  <tr>
                                      <td> <?= $item ['route_number']; ?></td>
                                      <td> <?= $item['record_type']; ?></td>
                                      <td> <?= $item ['source']; ?></td>
                                      <td> <?= $item ['subject_matter']; ?></td>
                                      <td> <?= $item ['action_unit']; ?></td>
                                      <td> <?= $item ['release_by']; ?></td>
                                      <td>
                                        <?php if (!empty($item['image'])): ?>
                                           <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item ['image']; ?>" style="width:50px; height: auto;">
                                        <?php else: ?>  
                                          <img src="../path/to/default_image.jpg" alt="No image available" style="width:50px; height: auto;">
                                        <?php endif; ?>
                                      </td>
                                      <td> <?= $item['status']; ?></td>
                                      <td> <?= $item ['remark']; ?></td>
                                      <!--td> <!-?= $item ['created_at']; ?></td-->
                                      <td> 
                                        <a href="edit-record.php?route_number=<?= $item ['route_number']; ?>" class="btn btn-info -btn-sm" >View</a>
                                        <a href="edit-record.php?route_number=<?= $item ['route_number']; ?>" class="btn btn-success -btn-sm" >Edit</a>
                                        <form action="code.php" method="POST" style="display:inline-block;">
                                          <input type="hidden" name="record_route_number" value="<?= $item ['route_number']; ?>">
                                          <button type="submit" class="btn btn-danger -btn-sm" name="delete_record_btn">Delete</button>
                                        </form>
                                      </td>
                                  </tr>
                                <?php
                            }
                          }
                          else
                          {
                              echo "<tr><td colspan='10'>No Records Found</td></tr>";
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