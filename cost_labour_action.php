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
$empid = $_REQUEST['stdId'];
$category = $_REQUEST['category'];
$landno= $_REQUEST['landno'];
$date = $_REQUEST['date'];
$labourwage=$_REQUEST['labourwage'];
$operatorwage=$_REQUEST['operatorwage'];            
$uid = $_SESSION["username"];
           /* print_r($number);
            print_r($empid);
            print_r($category);
            print_r($landno);
            echo "$date\n$labourwage\n$operatorwage";
            */
            $totalwagetoday=0;
             for($i=0; $i< sizeof($empid);$i++)
             {
                 $wage=0;
                if (in_array($i, $number)) {
                   if($category[$i]=="Labour")
                   {
                        $wage = $labourwage; 
                   }else
                   {
                        $wage = $operatorwage;
                   } 
                   $totalwagetoday= $totalwagetoday + $wage;
                   //echo "error at $i\n";
                   /*$res = pg_query($db,"UPDATE ifarm.investment SET investment_current = investment_current-$wage  where landno='".$landno[$i]."' and uid='$user'");	
                   if (!$result){
                        phpAlert("Please provide investment details First..","investment.php");
                    }*/		
 
 $test = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno[$i]."' and uid='$uid'");
if(pg_num_rows($test)){
	$testold = pg_query($db,"SELECT * FROM ifarm.investment where landno='".$landno[$i]."' and uid='$uid'");
	$row = pg_fetch_assoc($testold);
    $stock = $row['investment_initial'];
    $stockc = $row['investment_current'];
    $stockc =  $stockc - $wage;
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

                   $result = pg_query($db,"INSERT INTO ifarm.labourcharges VALUES ('".$empid[$i]."','".$landno[$i]."','$date',$wage,'$uid') ");
                   
                   if (!$result){
                        phpAlert("Error while inserting data...Please retry..","cost_labour.php");
                    }		

                }

             }
            $result = pg_query($db,"INSERT INTO ifarm.dailyexpense VALUES ('".$date."','Total worker charges of that day.','$totalwagetoday','Labour Charges','$uid') ");
                   if (!$result){
                        phpAlert("Cannot update daily expenses..Please retry..","cost_labour.php");
                    }		

            /*foreach($att as $key => $attendance) {
                          $at = $attendance ? 'P' : 'N';
  //              $query = "INSERT INTO `attendance`(`stud_id`,`att`) VALUES ('".$stdId[$key]."','".$at."') ";
    //            $result = mysql_query($query);
                           
            } */  

                        phpAlert("Data Updated..","costs.php");
?></html>