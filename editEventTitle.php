<?php

session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid=$_SESSION["username"];
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM ifarm.task WHERE taskid = '$id'";
	$result = pg_query($db, $sql);

if ($result){
header('Location: '.$_SERVER['HTTP_REFERER']);
}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$status = $_POST['status'];
	$workers = $_REQUEST['workers']; 
	
	
	//$sql = "UPDATE ifarm.task SET  title = '$title', color = '$color',status = '$status', workers = $workers WHERE taskid = '$id' ";
    $sql = "UPDATE ifarm.task SET  (title,color,status,workers) = ('$title', '$color','$status',$workers) WHERE taskid = '$id'";

	//echo $sql;	
    $result=pg_query($db, $sql);
//echo $sql;//." no : ".pg_num_rows($result);
if ($result)
{
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
else
	echo "update failed!!";
}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
