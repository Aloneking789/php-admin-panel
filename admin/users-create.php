<?php include ("includes/header.php"); ?>
<link id="pagestyle" href="./assets/css/soft-ui-dashboard.css" rel="stylesheet" />
<div class="row">
  <div class="col-md-12">
    <div class="cards-header">
      <h4>
        Add Users
        <a href="users.php" class="btn btn-danger fold float-end"> Back </a>
      </h4>
    </div>

    <div class="card-body">
      <?=alertMessage();?>
      <form action="code.php" method="POST"> <!-- Added method="post" -->
        <div class="mb-3"><label>Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3"><label>Phone No.</label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3"><label>Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3"><label>Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="mb-3"><label>Select Role</label>
          <select name="role" class="form-select">
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select> <!-- Added missing closing tag for select -->
        </div>
        <div class="col-md-3 mt-3 text-end"> <!-- Added col-md-3 div -->
          <div class="mb-3">
            <button type="submit" name="saveuser" class="btn btn-primary">Save</button> <!-- Added submit button -->
          </div>
        </div> <!-- Closing col-md-3 div -->
      </form>
    </div>
  </div>
</div>
<?php include ("includes/footer.php"); ?>
