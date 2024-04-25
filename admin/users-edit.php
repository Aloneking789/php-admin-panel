
<?php 
include("includes/header.php"); ?>
<link id="pagestyle" href="./assets/css/soft-ui-dashboard.css" rel="stylesheet" />
<div class="row">
  <div class="col-md-12">
    <div class="cards-header">
      <h4>
        Edit Users
        <a href="users.php" class="btn btn-danger fold float-end"> Back </a>
      </h4>
    </div>

    <div class="card-body">
      <form action="code.php" method="POST"> <!-- Ensure the correct action attribute -->
        <?php
        $paramresult = checkParamId('id');
        if (!is_numeric($paramresult)) {
          echo '<h5>' . $paramresult . '</h5>';
          return false;
        }

        $user = getById('users', checkParamId('id'));
        if ($user['status'] == 200) {
          ?>

<input type="hidden" name="userId" value = "<?=$user['data']['id'];?>">

          <div class="mb-3"><label>Name</label>
            <input type="text" name="name" value="<?= $user['data']['name']; ?>" class="form-control">
          </div>
          <div class="mb-3"><label>Phone No.</label>
            <input type="number" name="Phone" value="<?= $user['data']['phone']; ?>" class="form-control">
          </div>
          <div class="mb-3"><label>Email</label>
            <input type="text" name="Email" value="<?= $user['data']['email']; ?>" class="form-control">
          </div>
          <div class="mb-3"><label>Password</label>
            <input type="text" name="Password" value="<?= $user['data']['password']; ?>" class="form-control">
          </div>
          <div class="mb-3"><label>Select Role</label>
            <select name="role" class="form-select">
              <option value="">Select Role</option>
              <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
              <option value="user" <?= $user['data']['role'] == 'user' ? 'selected' : ''; ?>>User</option>
            </select> <!-- Added missing closing tag for select -->
          </div>
        <?php
        } else {
          echo '<h5>' . $user['message'] . '</h5>';
        }
        ?>
        <div class="col-md-3 mt-3 text-end"> <!-- Added col-md-3 div -->
          <div class="mb-3">
            <button type="submit" name="updateuser" class="btn btn-primary">Update</button> <!-- Added submit button -->
          </div>
        </div> <!-- Closing col-md-3 div -->
      </form>
    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>
