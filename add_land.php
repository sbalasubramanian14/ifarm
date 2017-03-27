<?php
header('Content-type: text/plain');
session_start();

 error_reporting(E_ALL);
include('connect.php');

$land_no = $_REQUEST['land_no'];
$area = $_REQUEST['area'];
$type = $_REQUEST['type'];
$uid = $_SESSION['username'];
$result = pg_query($db,"INSERT INTO ifarm.land VALUES ('$land_no',$area,'$type','$uid') ");

if ($result){
    header("location:edituser.php");
}		
?>
