<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header text-center">
                <h4>Record Unit Data </h4>
              </div>
              <div class="card-body">
                <table class="table table-secondary table-hover text-center">
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
                          <th>Action</th>
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
                                      <td> <?= $item ['release_by']; ?></td>
                                      <td>
                                        <img src="../uploads/<?= $item ['image']; ?>" alt="<?= $item ['image']; ?>" style="width:50px; height: auto;">
                                      </td>
                                      <td> <?= $item ['status']; ?></td>
                                      <td> <?= $item ['remark']; ?></td>
                                      <td> 
                                        <a href="edit-category.php?route_number=<?= $item ['route_number']; ?>" class="btn btn-primary btn-sm" >Edit</a>
                                        <form action="code.php" method="POST">
                                          <input type="hidden" name="category_route_number" value="<?= $item ['route_number']; ?>">
                                          <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                        </form>
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