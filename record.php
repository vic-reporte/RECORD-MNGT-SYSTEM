<?php
include('includes/header.php');
include('functions/user-functions.php');

?>

<div class="container-fluid py-2 mt-0 mb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header mt-0 border shadow p-3 rounded">
                <h2>Our Record Data 
                  <a href="add-record.php" class="btn btn-info float-end">Add Record</a>
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
                          <th>Action</th>
                      </tr>
                   </thead>
                    <tbody>
                      <?php
                          $record = getAllRecord('record_unit_data');
                          if(!empty($record))
                          {
                            foreach($record as $item)
                            {
                                ?>
                                  <tr>
                                      <td> <?= $item['route_number']; ?></td>
                                      <td> <?= $item['record_type']; ?></td>
                                      <td> <?= $item['source']; ?></td>
                                      <td> <?= $item['subject_matter']; ?></td>
                                      <td> <?= $item['action_unit']; ?></td>
                                      <td> 
                                        <a href="view-record.php?route_number=<?= $item ['route_number']; ?>" class="btn btn-info -btn-sm" >View</a>
                                        <a href="edit-record.php?route_number=<?= $item ['route_number']; ?>" class="btn btn-success -btn-sm" >Edit</a>
                                        <form action="code.php" method="POST" style="display:inline-block;">
                                          <input type="hidden" name="record_route_number" value="<?= $item ['route_number']; ?>">
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

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php include('includes/footer.php'); ?>