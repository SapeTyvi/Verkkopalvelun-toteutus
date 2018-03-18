<?php

include('connection.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', TRUE); // Error logging
ini_set('error_log', 'error.txt'); // Logging file
ini_set('log_errors_max_len', 1024); // Logging file size

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($testDB,"select username from user where username = '$user_check' ");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
$login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.html");
   } 

?>