<?php
header('Content-type: text/plain');
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}
 error_reporting(E_ALL);
include('connect.php');


$name = $_REQUEST['name'];
$type = $_REQUEST['type'];
$price =  $_REQUEST['price'];
$uid = $_SESSION['username'];


	$result = pg_query($db,"INSERT INTO ifarm.tool VALUES ('$name','$type',$price,'$uid') ");
	if ($result){
    header("location:tools.php");
		

}

?>
