<?php
require '../config/function.php';
$paraResult = checkParamId(('id'));
if (is_numeric($paraResult)) {
  $userId = validate($paraResult);
  $user = getById('users', $userId);
  if ($user['status'] == 200) {
    $userDeleteRes = deleteQuery('users', $userId);
    if ($userDeleteRes) {
      redirect('users.php','user deleted successfully');
    } else {
      redirect('users.php', 'something went wrong');
    }
  } else {
    redirect('users.php', $user['message']);
  }
} else {
  redirect('users.php', $paraResult);
}
?>
// // Include header file

// include("includes/header.php");


// // Check if user ID is provided via GET request
// if (isset($_GET['id'])) {
//   // Get the user ID
//   $user_id = $_GET['id'];

//   // Perform deletion operation (replace this with your actual deletion code)
//   // Example: DELETE FROM users WHERE id = $user_id
//   // If deletion is successful, you can redirect the user to a success page or back to the users list
//   // header("Location: users.php");
//   // exit;
// } else {
//   // If user ID is not provided, display an error message or redirect the user
//   echo "User ID not provided.";
// }

// // Include footer file
// include("includes/footer.php");
// ?>
<link id="pagestyle" href="./assets/css/soft-ui-dashboard.css" rel="stylesheet" />