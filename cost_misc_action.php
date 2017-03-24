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

$amount = $_REQUEST['amount'];
$exp= $_REQUEST['exp'];
$landno= $_REQUEST['landno'];
$date = $_REQUEST['date'];
$uid = $_SESSION["username"];
            
$test = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno."' and uid='$uid'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno."' and uid='$uid'");
	$row = pg_fetch_assoc($testold);
    $stock = $row['investment_initial'];
    $stockc = $row['investment_current'];
    $stockc =  $stockc - $amount;
    $prvdate= $row['date'];
	//$test2 = pg_query($db,"UPDATE ifarm.investment SET investment_initial = $stock, investment_current=$stockc  where landno='$landno' and uid='$user'");	
	$test2 = pg_query($db,"DELETE from ifarm.investment  where landno='".$landno."' and uid='$uid'");	
    if ($test2){
    	$result = pg_query($db,"INSERT INTO ifarm.investment VALUES ('$uid',$stock,$stockc,'".$landno."','$prvdate') ");
        if (!$result){
            phpAlert("Error in investment updation..","investment.php");
        }		

	}
}
else
{
     phpAlert("Please provide investment details First..","investment.php");
		

}

             

            $result = pg_query($db,"INSERT INTO ifarm.dailyexpense VALUES ('".$date."','".$exp."','$amount','Miscellaneous Charges','$uid') ");
            if (!$result){
                phpAlert("Cannot update daily expenses..Please retry..","cost_misc.php");
            }		

                        phpAlert("Data Updated..","costs.php");
?></html>