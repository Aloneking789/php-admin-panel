<?php
session_start();
require 'dbcon.php';

function validate($inputData){
  global $conn;
  $validatedData = mysqli_real_escape_string($conn, $inputData);
  return trim($validatedData);
}

function redirect($page, $status){
  $_SESSION['status'] = $status;
  header('Location: ' . $page);
  exit(0);
}

function alertMessage(){
  if(isset($_SESSION['status'])){
    echo '<div class="alert alert-success">
            <h4>' . $_SESSION['status'] . '</h4>
          </div>';
    unset($_SESSION['status']);
  }
}


function getAll($tableName){
  global $conn;
  $table = validate($tableName);

  $query = "SELECT * FROM $table";
  $result = mysqli_query($conn,$query);
  return $result;
}

function checkParamId($paramtype){
  if(isset($_GET[$paramtype])){
    if($_GET[$paramtype]!=null){
      return $_GET[$paramtype];
    }else{
      return 'No id found';
    }
  }else{
    return 'no id given';
  }
}


function getById($tableName, $id){
  global $conn;
  $table = validate($tableName);
  $id = validate($id);
  $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
  $result = mysqli_query($conn, $query);
  if($result){
      if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $response = [
              'status' => 200,
              'data' => $row, // Fixed the variable name
              'message' => 'Data found' // Fixed the quotation mark
          ];
      }else{
          $response = [
              'status' => 404,
              'message' => 'No data record found'
          ];
      }
  }else{
      $response = [
          'status' => 500,
          'message' => 'Something went wrong'
      ];
  }
  return $response; // Moved the return statement outside the if-else blocks
}

function deleteQuery($tableName, $id) {
  global $conn;
  $table = validate($tableName);
  $id = validate($id);
  $query = "DELETE FROM $table WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  return $result;
}



?>
