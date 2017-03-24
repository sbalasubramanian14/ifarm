<?php

session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid=$_SESSION["username"];

//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']))
{
	
	$title = $_POST['title'];
	$status = $_POST['status'];
	$workers = $_REQUEST['workers']; 
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$landcrop = $_REQUEST['landcrop'];

	$sql = "INSERT INTO ifarm.task VALUES ('$title','$status',$workers, '$uid', '$landcrop','$start','$end', '$color','$title.$start')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	//echo $sql;
	$result = pg_query($db, $sql);

if ($result){
header('Location: '.$_SERVER['HTTP_REFERER']);
}}		
?>
