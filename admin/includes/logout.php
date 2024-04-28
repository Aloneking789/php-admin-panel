<?php
require 'C:\xampp\htdocs\php-admin-panel\config\function.php';
if(isset($_SESSION['auth'])){
    logoutSession();
    redirect('../../login.php','Logged-out successfully');
}
?>