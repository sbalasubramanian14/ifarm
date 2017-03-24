<pre>
<html>
<?php
session_start();
if(!isset($_SESSION["username"]))
{
  header("refresh:0;index.php");
}
function phpAlert($msg,$redirect) {
    echo '<script type="text/javascript">alert("' . $msg . '"); window.location.href="'.$redirect.'";</script>';
   // echo '<script > header("location:newcultivation.php"); </script>';
}

 error_reporting(E_ALL);
include('connect.php');

$number = $_REQUEST['att'];
$name = $_REQUEST['name'];
$type = $_REQUEST['type'];
$exp= $_REQUEST['exp'];
$landno= $_REQUEST['landno'];
$date = $_REQUEST['date'];
$uid = $_SESSION["username"];

$totalwagetoday=0;
for($i=0; $i < sizeof($name); $i++)
{
     $wage=0;
     if (in_array($i, $number)) {
     $totalwagetoday= $totalwagetoday + $exp[$i];
                 
$test = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno[$i]."' and uid='$uid'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno[$i]."' and uid='$uid'");
	$row = pg_fetch_assoc($testold);
    $stock = $row['investment_initial'];
    $stockc = $row['investment_current'];
    $stockc =  $stockc - $exp[$i];
    $prvdate= $row['date'];
	//$test2 = pg_query($db,"UPDATE ifarm.investment SET investment_initial = $stock, investment_current=$stockc  where landno='$landno' and uid='$user'");	
	$test2 = pg_query($db,"DELETE from ifarm.investment  where landno='".$landno[$i]."' and uid='$uid'");	
    if ($test2){
    	$result = pg_query($db,"INSERT INTO ifarm.investment VALUES ('$uid',$stock,$stockc,'".$landno[$i]."','$prvdate') ");
        if (!$result){
            phpAlert("Error in investment updation..","investment.php");
        }		

	}
}
else
{
     phpAlert("Please provide investment details First..","investment.php");
		

}

             }}
            $result = pg_query($db,"INSERT INTO ifarm.dailyexpense VALUES ('".$date."','Machinery working expenses.','$totalwagetoday','Machinery Charges','$uid') ");
            if (!$result){
                phpAlert("Cannot update daily expenses..Please retry..","cost_machinery.php");
            }		

                        phpAlert("Data Updated..","costs.php");
?></html>