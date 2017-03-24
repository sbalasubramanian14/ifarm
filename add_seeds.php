<?php
header('Content-type: text/plain');
session_start();

 error_reporting(E_ALL);
include('connect.php');


$crop = $_REQUEST['crop'];
$qty = $_REQUEST['qty'];
$ppqty =  $_REQUEST['ppqty'];
$uid = $_SESSION['username'];
$variety = $_REQUEST['variety'];

$test = pg_query($db,"SELECT * FROM ifarm.seed where variety='$variety' and uid='$uid'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.seed where variety='$variety' and uid='$uid'");
	$row = pg_fetch_assoc($testold);
	$stock =  $row['stock'];
	$stock =  $stock + $qty;
	$test2 = pg_query($db,"UPDATE ifarm.seed SET stock = $stock  where variety='$variety' and uid='$uid'");	
	if ($test2){
    header("location:seeds.php");
		
	}	


}
else{

	$result = pg_query($db,"INSERT INTO ifarm.seed VALUES ('$variety','$crop','$qty','$ppqty','$uid') ");

	if ($result){
	    header("location:seeds.php");
		
	}		
	
}
?>
