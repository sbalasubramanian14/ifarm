<?php

session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid=$_SESSION["username"];

//if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	if (isset($_REQUEST['i']) && isset($_REQUEST['s']) && isset($_REQUEST['e'])){
	
	//$id = $_POST['Event'][0];
	//$start = $_POST['Event'][1];
	//$end = $_POST['Event'][2];
	$id = $_REQUEST['i'];
	$start = $_REQUEST['s'];
	$end = $_REQUEST['e'];
	
	//$sql = "UPDATE ifarm.task SET start = '$start', end = '$end' WHERE taskid = '$id' ";
	   $sql = "UPDATE ifarm.task SET  (start,end) = ('$start', '$end') WHERE taskid = '$id'";
	echo $sql;
	$result = pg_query($db, $sql);

	if ($result){
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	else
	    echo "update Failed!!";
	}
	
?>
