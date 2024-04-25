<?php include("includes/header.php"); ?>
<link id="pagestyle" href="./assets/css/soft-ui-dashboard.css" rel="stylesheet" />
<div class="row">
  <div class="col-md-12">
    <div class="cards-header">
      <h4>
        RD COLLEGE
        <a href="users-create.php" class="btn btn-primary fold float-end"> Add User </a>
      </h4>
    </div>
    <div class="card-body">
      <?= alertMessage(); ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $users = getAll('users');
          if (mysqli_num_rows($users) > 0) {
            foreach ($users as $user) {
          ?>
              <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['phone']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                  <a href="users-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="users-delete.php" class="btn btn-danger btn-sm mx-2 mr-4">Delete</a>
                </td>
              </tr>
          <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="6">No records found</td>
            </tr>
          <?php
          }
          ?>
          <!-- <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a href="users-edit.php" class="btn btn-success btn-sm">Edit</a>
              <a href="users-delete.php" class="btn btn-danger btn-sm mx-2 mr-4">Delete</a>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>
