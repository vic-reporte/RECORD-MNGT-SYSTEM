<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');
?>

<div class="container-fluid py-2 mt-0 mb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header mt-0 border shadow p-3 rounded">
                <h2>Users List 
                  <a href="add-users.php" class="btn btn-info float-end">Add User</a>
                </h2>
              </div>
              <div class="card-body">
                <table class="table table-secondary table-hover">
                   <thead>
                      <tr>
                          <th>ID</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Role As</th>
                          <th>Action</th>
                      </tr>
                   </thead>
                    <tbody>
                      <?php
                        $users = getAllUsers('Users List'); // Replace 'users' with your actual table name
                            if (!empty($users))
                                foreach ($users as $user) {
                                if (isset($user['id'])) { // Check if 'id' key exists    
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']); ?></td>
                                        <td><?= htmlspecialchars($user['email']); ?></td>
                                        <td><?= htmlspecialchars($user['password']); ?></td>
                                        <td><?= htmlspecialchars($user['role_as']); ?></td>
                                        <td>
                                            <a href="users-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="users-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="code.php" method="POST" style="display:inline-block;">
                                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" name="delete_user_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                 }        
                                } else {
                                     echo "<tr><td colspan='7'>No Users Found</td></tr>";
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

