<?php
require 'config/function.php';
if (isset($_POST['loginbtn'])) {
  $emailInput = validate($_POST['email']);
  $passwordInput = validate($_POST['password']);

  $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
  $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

  if ($email != '' && $password != '') {
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['role'] == 'admin') {
          $_SESSION['auth'] = true;
          $_SESSION['loggedInUserRole'] = $row['role'];
          $_SESSION['loggedInUser'] = [
            'name' => $row['name'],
            'email' => $row['email']
          ];
          redirect('admin/index.php', 'logged in successfully');
        } else {
          $_SESSION['auth'] = true;
          $_SESSION['loggedInUserRole'] = $row['role'];
          $_SESSION['loggedInUser'] = [
            'name' => $row['name'],
            'email' => $row['email']
          ];
          redirect('index.php', 'logged in successfully');
        }
      } else {
        redirect('login.php', 'Wrong email-id or password');
      }
    } else {
    }
  } else {
    redirect('login.php', 'Field is Mandatory');
  }
}
