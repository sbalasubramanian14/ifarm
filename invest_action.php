<?php
header('Content-type: text/plain');
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}
session_start();

 error_reporting(E_ALL);
include('connect.php');

$landno = $_REQUEST['landno'];
$amount = $_REQUEST['amount'];
$date = $_REQUEST['date'];
$user=$_SESSION["username"];
$test = pg_query($db,"SELECT * FROM ifarm.investment where landno='$landno' and uid='$user'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.investment where landno='$landno' and uid='$user'");
	$row = pg_fetch_assoc($testold);
	$stock =  $row['investment_initial'];
    $stockc = $row['investment_current'];
	$stock =  $stock + $amount;
    $stockc =  $stockc + $amount;
	//$test2 = pg_query($db,"UPDATE ifarm.investment SET investment_initial = $stock, investment_current=$stockc  where landno='$landno' and uid='$user'");	
	$test2 = pg_query($db,"DELETE from ifarm.investment  where landno='$landno' and uid='$user'");	
    if ($test2){
    	$result = pg_query($db,"INSERT INTO ifarm.investment VALUES ('$user',$stock,$stockc,'$landno','$date') ");
        if ($result){
            header("location:investment.php");
        }		
        else{
            echo "Internal error!!";
        }

	}
}
else
{
$result = pg_query($db,"INSERT INTO ifarm.investment VALUES ('$user',$amount,$amount,'$landno','$date') ");
if ($result){
    header("location:investment.php");
}		
else{
    echo "Internal error!!";
}
}
?>
