<?php
require '../config/function.php';

if (isset($_POST['saveuser'])) {
  $name = validate($_POST['name']);
  $phone = validate($_POST['phone']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  $role = validate($_POST['role']);
  // $userId = validate($_POST['userId']);
  // $user = getById('users',$userId);
  // if($user['status'] != 200){
  //   redirect('user-edit.php?userId','User/Admin created Successfully');
  // }

  // Check if any of the required fields are empty
  if ($name != '' && $email != '' && $phone != '' && $password != '') {
    // Prepare the SQL query
    $query = "INSERT INTO users (name, phone, email, password, role) VALUES ('$name', '$phone', '$email', '$password', '$role')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
      // Redirect if the insertion was successful
      redirect('users.php', 'User added successfully');
    } else {
      // Redirect with error message if the insertion failed
      redirect('users-create.php', 'Failed to add user');
    }
  } else {
    // Redirect if any required field is empty
    redirect('users-create.php', 'Please fill all the input fields');
  }
} else {
  // Redirect if saveuser is not set
  // redirect('users-create.php', 'Invalid request in create');
  
if(isset($_POST['updateuser'])) {
  $name = validate($_POST['name']);
  $email = validate($_POST['email']);
  $phone = validate($_POST['phone']);
  $password = validate($_POST['password']);
  $role = validate($_POST['role']);

  $userId = validate($_POST['userId']);
  $user = getById('users', $userId);
  if ($user['status'] != 200) {
    redirect('users-edit.php?id='. $userId , 'No such Id found');
  }

  // Check if any of the required fields are empty
  if ($name != '' || $email != '' || $phone != '' || $password != '') {
    // Prepare the SQL query
    $query = "UPDATE users SET 
      name='$name', 
      email='$email',
      phone='$phone', 
      password='$password', 
      role='$role' 
      WHERE id='$userId'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
      // Redirect if the insertion was successful
      redirect('users.php', 'User updated successfully');
    } else {
      // Redirect with error message if the insertion failed
      redirect('users-edit.php', 'Failed to update user');
    }
  } else {
    // Redirect if any required field is empty
    redirect('users-edit.php', 'Please fill all the input fields');
  }
} else {
  // Redirect if saveuser is not set
  redirect('users-edit.php', 'Invalid request in update');
}
}




?>
