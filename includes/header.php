<?php
require 'config/function.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($pageTitle)){echo $pageTitle;}else{echo 'Rd school';}?></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <?php include('navbar.php');?>