<?php
header('Content-type: text/plain');
session_start();

 error_reporting(E_ALL);
include('connect.php');

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$uname = $_REQUEST['uname'];
$password = $_REQUEST['password'];
$result = pg_query($db,"INSERT INTO ifarm.users VALUES ('$password','$uname','$fname','$lname') ");

if ($result){
    header("location:success.html");
}		
?>
