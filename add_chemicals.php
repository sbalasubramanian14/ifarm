<?php
header('Content-type: text/plain');
session_start();

 error_reporting(E_ALL);
include('connect.php');
$uid = $_SESSION['username'];

$name = $_REQUEST['name'];
$type = $_REQUEST['type'];
$qty =  $_REQUEST['qty'];
$ppqty = $_REQUEST['ppqty'];

$test = pg_query($db,"SELECT * FROM ifarm.chemicals where name='$name' and uid='$uid'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.chemicals where name='$name' and uid='$uid'");
	$row = pg_fetch_assoc($testold);
	$stock =  $row['stock'];
	$stock =  $stock + $qty;
	$test2 = pg_query($db,"UPDATE ifarm.chemicals SET stock = $stock  where name='$name' and uid='$uid'");	
	if ($test2){
    header("location:chemicals.php");
		
	}	
}
else{

	$result = pg_query($db,"INSERT INTO ifarm.chemicals VALUES ('$name','$type',$qty,$ppqty,'$uid') ");
	//echo "INSERT INTO ifarm.chemicals VALUES ('$name','$type',$qty,$ppqty,'$uid') ";
	if ($result){
	    header("location:chemicals.php");
		
	}		
	
}
?>
