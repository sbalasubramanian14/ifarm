<?php
header('Content-type: text/plain');
session_start();


 error_reporting(E_ALL);
include('connect.php');


$login = $_REQUEST['username'];
$password =$_REQUEST['password'];

$result = pg_query($db,"SELECT * FROM ifarm.users where username = '$login' and password = '$password'");

/*
  if(!$result){
      session_destroy();
      header("location:index.php");
   } 
*/  
  if($row = pg_fetch_assoc($result)){
   
  $_SESSION['name'] = $row['fname'];
  $_SESSION['username'] = $row['username'];
   header("location:home.php");
  }
  else{
      $_SESSION['error']= "error";
      //session_write_close();
      header("location:index.php");
  }

?>
