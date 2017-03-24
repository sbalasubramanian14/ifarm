<pre>
<?php
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid=$_SESSION["username"];
$string = file_get_contents("season.json");
$season = json_decode($string, true);
$string1 = file_get_contents("rainfall.json");
$rainfall = json_decode($string1, true);
$string2 = file_get_contents("temp.json");
$temp = json_decode($string2, true);
$string3 = file_get_contents("raintemp.json");
$raintemp = json_decode($string3, true);

//print_r($season);
function mon($str) {
        switch($str)
        {
          case "January" : return 1; break;
          case "February": return 2; break;
          case "March": return 3; break;
          case "April": return 4; break;
          case "May": return 5; break;
          case "June": return 6; break;
          case "July": return 7; break;
          case "August": return 8; break;
          case "September": return 9; break;
          case "October": return 10; break;
          case "November": return 11; break;
          case "December": return 12; break;

        }
    }
function revmon($str) {
        switch($str)
        {
          case 1: return "January"; break;
          case 2: return "February"; break;
          case 3: return "March"; break;
          case 4: return "April"; break;
          case 5: return "May"; break;
          case 6: return "June"; break;
          case 7: return "July"; break;
          case 8: return "August"; break;
          case 9: return "September"; break;
          case 10: return "October"; break;
          case 11: return "November"; break;
          case 12: return "December"; break;

        }
    }


$crop = $_REQUEST['crop'];
$sea = $_REQUEST['season'];
$state =  $_REQUEST['state'];
$district = $_REQUEST['district'];
$sowing = $_REQUEST['sowing'];
$harvesting = $_REQUEST['harvesting'];
$temper = $_REQUEST['temp'];
echo $crop." ".$sea." ".$sowing." ".$harvesting." ".$state." ".$district." ".$temper;
//___________________________________________________________________________________
//*****************************
//Seasonal Module
//*****************************
$list= array();
$flag = "wrong";
for($i=0 ; $i < 34 ; $i++)
{
  if($crop == $season[$i]['crop'])
  {
    if($sea == $season[$i]['season'])
    {
      $flag = "correct";
      break;
    }
  }
}
$indi1=0;
$percent1=0;
$percent2=0;
$percent3=0;

if($flag == "correct")
{
  $so=0;
  $ha=0;
  $indi1++;
  $list[0]="Correct Season to plant $crop.";
  $somo="";
  $hamo="";
  for($j=0; $j < sizeof($season[$i]['sowing']) ;$j++)
  {
     if($season[$i]['sowing'][$j] == $sowing)
     {
       $so=1;
       break;
     }
     $somo.=$season[$i]['sowing'][$j].",";
  }
 // echo "sow : $j";
  for($j=0; $j < sizeof($season[$i]['harvesting']) ;$j++)
  {
     if($season[$i]['harvesting'][$j] == $harvesting)
     {
      // echo "harvesting correct!";
       $ha=1;
       break;
     }
     $hamo.=$season[$i]['harvesting'][$j].",";
  }
  echo "hamo : ".$hamo;
  if($so && $ha)
  {
      $list[1]="Correct sowing and harvesting months.";
      $indi1++;
  }
  else if($so)
  {
      $list[1]="Correct sowing month only. Incorrect harvesting month. Suggested months to harvest : ".$hamo.".";
  }
  else if($ha)
  {
  $list[1]="Correct harvesting month only. Incorrect sowing month. Suggested months for sowing : ".$somo.".";
  }
  else
  {
  $list[1]="Incorrect sowing and harvesting month!";
  }
  //echo "har : $j";
  if(mon($sowing)<mon($harvesting))
      $givMon =mon($harvesting)-mon($sowing)+1;
  else
      $givMon = 12+mon($harvesting)-mon($sowing)+1;

  if($givMon >= $season[$i]['month'])
  {
    $list[2]= "Difference betweem harvesting and sowing month is good for high yield.";
    $indi1++;
  }
  else
  {
    $list[2]= "Difference betweem harvesting and sowing month is NOT enough. Suggested no.of months : ".$season[$i]['month'];
  }
}
$percent1=($indi1/3)*100;
print_r($list);
//____________________________________________________________________
//***************************************
//Rainfall Analysis
//***************************************

//print_r($rainfall);
$dist_flag=0;
$avg_count=0;
$totalrainfall=0;
for($i=0;$i < sizeof($rainfall);$i++)
{
  if($rainfall[$i]['State']== $state && $rainfall[$i]['District'] == $district)
  {
    echo $rainfall[$i]['Annual Total']."\n";
    $totalrainfall+=$rainfall[$i]['Annual Total'];
    $avg_count++;
    $dist_flag = 1;
  }
}
$avg=$totalrainfall/$avg_count;
if($dist_flag)
{
  echo "Rainfall in the selected region is : ".$avg;
}
else
{
  echo "Incorrect State or District..\n";
}
//print_r($raintemp);
$index=0;
for($i=0;$i < sizeof($raintemp);$i++)
{
  if($raintemp[$i]['crop']== $crop)
  {
    $index=$i;
    if( $avg >= $raintemp[$i]['lowRain'] && $avg <= $raintemp[$i]['highRain'] )
    {
      echo "The Selected Region is highly Suitable according to rainfall data..";
      $percent2=100;
      break;
    }
    else if($avg > $raintemp[$i]['highRain'] )
    {
      echo "The Selected Region is NOT Suitable because of heavy rainfall than required...";
      $percent2 = 40;
    }
    else if( $avg < $raintemp[$i]['lowRain'] )
    {
      echo "The Selected Region is NOT Suitable because of low rainfall than required...";
      $percent2 = 40;
    } 
    
    break;
  }
}
//_______________________________________________________________________________
//************************************
//Temperature analysis
//************************************
$maxTempArr=array();
$minTempArr=array();
for($i=0,$k=0; $i < sizeof($temp);$i++)
{
  if($temp[$i]['district'] == $temper)
  {
    $maxTempArr[$k] = $temp[$i]['maxTemp'];
    $minTempArr[$k] = $temp[$i]['minTemp'];
    $k++;
  }
}
print_r($maxTempArr);
print_r($minTempArr);

$sust=0;
//$u=0;
$cropLostMonth=0;
for($i=0,$j= mon($sowing)-1 ;$i<$givMon;$i++, $j=($j+1)%12)
{
   $avtemp= ($maxTempArr[$j] + $minTempArr[$j])/2;
   echo "\nmonth : $j max $maxTempArr[$j] min $minTempArr[$j] av $avtemp clow ".$raintemp[$index]['lowTemp']." chi". $raintemp[$index]['highTemp'] ."\n";
   if($avtemp >= $raintemp[$index]['lowTemp'] && $avtemp <= $raintemp[$index]['highTemp'])
   {
      $sust++;
   }
   else
   {
     $cropLostMonth=$j;
     break;
   }
} 
echo $sust. " index ".$index;
echo "\nRegional Temperature sustinability of the crop '".$crop."' is : ".(($sust/$givMon)*100) ."%";
$percent3=(($sust/$givMon)*100);

echo "\n\nSeason : $percent1\nRainfall : $percent2\nTemperature : $percent3\n";
?>
<html>
<style>
@import url(http://fonts.googleapis.com/css?family=Lato:700);

.size(@w, @h) {
  height: @h;
  width: @w;
}

// --
*,
*:before,
*:after {
  box-sizing: border-box;
}

html,
body {
  background: #ecf0f1;
  color: #444;
  font-family: 'Lato', Tahoma, Geneva, sans-serif;
  font-size: 16px;
  padding: 10px;
}

.set-size {
  font-size: 10em;
}

.charts-container:after {
  clear: both;
  content: "";
  display: table;
}

@bg: #34495e;
@size: 1em;

.pie-wrapper {
  .size(@size, @size);
  float: left;
  margin: 15px;
  position: relative;
  
  &:nth-child(3n+1) {
    clear: both;
  }

  .pie {
    .size(100%, 100%);
    clip: rect(0, @size, @size, @size / 2);
    left: 0;
    position: absolute;
    top: 0;

    .half-circle {
      .size(100%, 100%);
      border: @size / 10 solid #3498db;
      border-radius: 50%;
      clip: rect(0, @size / 2, @size, 0);
      left: 0;
      position: absolute;
      top: 0;
    }
  }

  .label {
    @font-size: @size / 4;
    @font-size-redo: @size * 4;

    background: @bg;
    border-radius: 50%;
    bottom: @font-size-redo / 10;
    color: #ecf0f1;
    cursor: default;
    display: block;
    font-size: @font-size;
    left: @font-size-redo / 10;
    line-height: @font-size-redo * .65;
    position: absolute;
    right: @font-size-redo / 10;
    text-align: center;
    top: @font-size-redo / 10;

    .smaller {
      color: #bdc3c7;
      font-size: .45em;
      padding-bottom: 20px;
      vertical-align: super;
    }
  }

  .shadow {
    .size(100%, 100%);
    border: @size / 10 solid #bdc3c7;
    border-radius: 50%;
  }

  &.style-2 {
    .label {
      background: none;
      color: #7f8c8d;

      .smaller {
        color: #bdc3c7;
      }
    }
  }

  &.progress-30 {
    .draw-progress(30, #3498db);
  }

  &.progress-60 {
    .draw-progress(60, #9b59b6);
  }

  &.progress-90 {
    .draw-progress(90, #e67e22);
  }

  &.progress-45 {
    .draw-progress(45, #1abc9c);
  }

  &.progress-75 {
    .draw-progress(75, #8e44ad);
  }

  &.progress-95 {
    .draw-progress(95, #e74c3c);
  }
}

.pie-wrapper--solid {
  border-radius: 50%;
  overflow: hidden;

  &:before {
    border-radius: 0 100% 100% 0 / 50%;
    content: '';
    display: block;
    height: 100%;
    margin-left: 50%;
    transform-origin: left;
  }
  
  .label {
    background: transparent;
  }
  
  &.progress-65 {
    .draw-progress--solid(65, #e67e22, @bg);
  }
  
  &.progress-25 {
    .draw-progress--solid(25, #9b59b6, @bg);
  }
  
  &.progress-88 {
    .draw-progress--solid(88, #3498db, @bg);
  }
}

// --
.draw-progress(@progress, @color) when (@progress <= 50) {
  .pie {
    .right-side {
      display: none;
    }
  }
}

.draw-progress(@progress, @color) when (@progress > 50) {
  .pie {
    clip: rect(auto, auto, auto, auto);

    .right-side {
      transform: rotate(180deg);
    }
  }
}

.draw-progress(@progress, @color) {
  .pie {
    .half-circle {
      border-color: @color;
    }

    .left-side {
      @rotate: @progress * 3.6;
      transform: rotate(~'@{rotate}deg');
    }
  }
}

.draw-progress--solid(@progress, @color, @bg) when (@progress <= 50) {
  &:before {
    background: @bg;
    transform: rotate((100 - (50 - @progress)) / 100 * 360deg * -1);
  }
}

.draw-progress--solid(@progress, @color, @bg) when (@progress > 50) {
  &:before {
    background: @color;
    transform: rotate((100 - @progress) / 100 * 360deg);
  }
}

.draw-progress--solid(@progress, @color, @bg) {
  background: linear-gradient(to right, @color 50%, @bg 50%);
}
</style>
<body>



<div class="set-size charts-container">
  <div class="pie-wrapper progress-30">
    <span class="label"><?php echo $percent1;?><span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
  </div>

  <div class="pie-wrapper progress-60">
    <span class="label"><?php echo $percent2;?><span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
  </div>

  <div class="pie-wrapper progress-90">
    <span class="label"><?php echo $percent3;?><span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
  </div>

  <div class="pie-wrapper progress-45 style-2">
    <span class="label">45<span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
    <div class="shadow"></div>
  </div>

  <div class="pie-wrapper progress-75 style-2">
    <span class="label">75<span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
    <div class="shadow"></div>
  </div>

  <div class="pie-wrapper progress-95 style-2">
    <span class="label">95<span class="smaller">%</span></span>
    <div class="pie">
      <div class="left-side half-circle"></div>
      <div class="right-side half-circle"></div>
    </div>
    <div class="shadow"></div>
  </div>
  
  <div class="pie-wrapper pie-wrapper--solid progress-65">
    <span class="label">65<span class="smaller">%</span></span>
  </div>
  
  <div class="pie-wrapper pie-wrapper--solid progress-25">
    <span class="label">25<span class="smaller">%</span></span>
  </div>
  
  <div class="pie-wrapper pie-wrapper--solid progress-88">
    <span class="label">88<span class="smaller">%</span></span>
  </div>
</div>
</body>