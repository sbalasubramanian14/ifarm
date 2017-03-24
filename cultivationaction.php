<!DOCTYPE html>
<html>
<?php

//header('Content-type: text/plain');
session_start();
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '"); window.location.href="newcultivation.php";</script>';
   // echo '<script > header("location:newcultivation.php"); </script>';
}
 error_reporting(E_ALL);
include('connect.php');
$uid=$_SESSION["username"];


$land = $_REQUEST['land'];
$crop = $_REQUEST['crop'];
$variety = $_REQUEST['variety'];
//$area = $_REQUEST['area'];

$seeds_qty = $_REQUEST['seedsqty']; 
 $date = $_REQUEST['date'];
$test = pg_query($db,"SELECT * FROM ifarm.land where land_no = '$land'  AND uid='$uid'");

 if($row = pg_fetch_assoc($test)){
   
 // $p_area = $row['p_area'];
 // $r_area = $row['r_area']; 
 // if($r_area == 0){
   // if($area <= $r_area){
     // $temp = $p_area;
      $test2 = pg_query($db,"SELECT * FROM ifarm.seed where variety = '$variety'");
      if($row2 = pg_fetch_assoc($test2)){
       $stock =$row2['stock'] - $seeds_qty;
        if($stock > 0 ){
      $sample = pg_query($db,"SET datestyle = mdy");
      $result = pg_query($db,"INSERT INTO ifarm.cultivation VALUES ('$land','$date','$crop','$variety',$seeds_qty,'$uid') ");
      $test3 = pg_query($db,"UPDATE ifarm.seed SET stock = $stock where variety = '$variety'  AND uid='$uid'");

     // $test2 = pg_query($db,"UPDATE ifarm.land r_area='$r_area' where land_no = '$land_no' ");
      if($result && $test3 ){       // echo '<script language="javascript">';

       header("location:home.php");
     // echo '</script>';
      //header("location:newcultivation.php");
      }
      
    }
    else
    {
        phpAlert("Required Stock Exceeds the current stock!!");
     //   header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
   }else{
       phpAlert("The specified seed variety is not available");
      // header('Location: ' . $_SERVER['HTTP_REFERER']);
      }

  }
  else{
     //echo '<script language="javascript">';
       phpAlert("No such land exists");
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    //
      //echo '</script>';
     // header("location:newcultivation.php"); 
  }
  //sleep(20);
 // header("location:home.php"); 
 
 


?>
</html>