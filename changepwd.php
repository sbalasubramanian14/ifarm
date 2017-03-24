<?php
header('Content-type: text/plain');
session_start();


 error_reporting(E_ALL);
include('connect.php');

$oldpwd = $_REQUEST['opwd'];
$newpwd = $_REQUEST['npwd'];
$test1 = pg_query($db,"SELECT password from ifarm.user where username = '".$_SESSION['username'].""' ");
$row = pg_fetch_assoc($test1);
if($row['password'] == $oldpwd){
$test2 = pg_query($db,"UPDATE ifarm.user SET password = '$newpwd' where username = '$_SESSION['username']' ");
}

?>