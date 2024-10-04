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
                <table class="table table-secondary">
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
                      <?php
                          $category = getAll("Record Unit Data");
                          if(mysqli_run_rows($category) > 0) {
                              foreach($category as $item){
                                  ?>
                                    <tr>
                                        <td> <?= $item['Route Number'] ?></td>
                                        <td> <?= $item['Record Type'] ?></td>
                                        <td> <?= $item['Subject Matter'] ?></td>
                                        <td> <?= $item['Action Unit'] ?></td>
                                        <td> <?= $item['Status'] ?></td>
                                        <td> <?= $item['Remark'] ?></td>
                                        <td> 
                                          <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td>
                                          <a href="#" class="btn btn-primary">Edit</a>
                                        </td> 
                                    </tr>
                                  <?php
                              }
                          }
                          else
                          {
                            echo "No records found";
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