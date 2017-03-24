<?php 
session_start();
header('Content-Type: application/json');
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid = $_SESSION['username'];
//echo "SELECT * FROM ifarm.dailyexpense where uid ='$uid'";                             
$result = pg_query($db,"SELECT date,amount FROM ifarm.dailyexpense where uid ='$uid'");
$rows=array();
//echo "no:".pg_num_rows($result);
//$ec = "?([";
$ec = "[";
if (pg_num_rows($result) != 0)
{
    $i=1;
    while ($row = pg_fetch_array($result)) {
        $rows[]=$row;
       $str=$row['date'];
       $strs=explode("-", $str);
       	if(pg_num_rows($result) == $i)
			$ec.= "[Date.UTC(".$strs[0].",".$strs[1].",".$strs[2].")," . $row['amount']. "]";
        //	$ec.= '{"0" : "Date.UTC('.$strs[0].','.$strs[1].','.$strs[2].')","1": "'. $row['amount']. '"}';
		else
        //    $ec.= '{"0" : "Date.UTC('.$strs[0].','.$strs[1].','.$strs[2].')","1":" '. $row['amount']. '"},';
			$ec.= "[Date.UTC(".$strs[0].",".$strs[1].",".$strs[2].")," . $row['amount']. "],";
            $i++;
    }
    //print_r(json_encode($rows));

}
else
{
    echo "error";
}
$ec.= "]";
//$ec.= "]);";
//echo $ec;
echo json_encode($rows);
?>
