<!DOCTYPE html>
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
//print_r($list);
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
  $list[3]= "Annual Average Rainfall in the selected region is : ".$avg;
}
else
{
  $list[3]= "Incorrect State or District..\n";
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
      $list[4]= "The Selected Region is highly Suitable according to rainfall data..";
      $percent2=100;
      break;
    }
    else if($avg > $raintemp[$i]['highRain'] )
    {
      $list[4]= "The Selected Region is NOT Suitable because of heavy rainfall than required...";
      $percent2 = 40;
    }
    else if( $avg < $raintemp[$i]['lowRain'] )
    {
      $list[4]= "The Selected Region is NOT Suitable because of low rainfall than required...";
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
//print_r($maxTempArr);
//print_r($minTempArr);

$sust=0;
//$u=0;
$cropLostMonth=0;
for($i=0,$j= mon($sowing)-1 ;$i<$givMon;$i++, $j=($j+1)%12)
{
   $avtemp= ($maxTempArr[$j] + $minTempArr[$j])/2;
  // echo "\nmonth : $j max $maxTempArr[$j] min $minTempArr[$j] av $avtemp clow ".$raintemp[$index]['lowTemp']." chi". $raintemp[$index]['highTemp'] ."\n";
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
//echo $sust. " index ".$index;
$list[5] = "\nRegional Temperature sustinability of the crop '".$crop."' is : ".(($sust/$givMon)*100) ."%";
$percent3=(($sust/$givMon)*100);

//echo "\n\nSeason : $percent1\nRainfall : $percent2\nTemperature : $percent3\n";
?>


<html>

  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>I - Farm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/codrops-stepsform/css/component.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/themes/simple.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
  <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
  <![endif]-->
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/jQuery-plugin-progressbar.css">
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="assets/jQuery-plugin-progressbar.js"></script>
   
  </head>
  <body class="fixed-header no-header" >
  <?php 


  ?>

    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="assets/img/logo.png" alt="logo" class="brand" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" width="78" height="22">
        
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="home.php" class="detailed">
              <span class="title">Home</span>
              
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="tasks.php" class="detailed">
              <span class="title">Tasks</span>
              
            </a>
            <span class="icon-thumbnail"><i class="pg-note"></i></span>
          </li>
          <li class="">
            <a href="costs.php" class="detailed">
              <span class="title">Costs</span>
              
            </a>
            <span class="icon-thumbnail">₹</span>
          </li>
          <li class="">
            <a href="workers.php"><span class="title">Workers</span></a>
            <span class="icon-thumbnail"><i class="fa fa-group"></i></span>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Stock</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-bag"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="seeds.php">Seed</a>
                <span class="icon-thumbnail">Seeds</span>
              </li>
              <li class="">
                <a href="tools.php">Tools</a>
                <span class="icon-thumbnail">Tools</span>
              </li>
              <li class="">
                <a href="chemicals.php">Chemicals</a>
                <span class="icon-thumbnail">Chem</span>
              </li>
              
            </ul>
          </li>
          <li class="">
            <a href="schedule.php">
              <span class="title">Analysis</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-calender"></i></span>
          </li>
          <li class="">
            <a href="edituser.php">
              <span class="title">Settings</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-gear"></i></span>
          </li>
       
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" width="78" height="22">
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs m-t-10">
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="assets/img/avatar.jpg" alt="" data-src="assets/img/avatar.jpg" data-src-retina="assets/img/avatar.jpg" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="edituser.html"><i class="pg-settings_small"></i> Settings</a>
                </li>
               
                <li class="bg-master-lighter">
                  <a href="logout.php" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" width="78" height="22">
            </div>
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold"><?php echo $_SESSION['name']; ?></span> 
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="assets/img/avatar.jpg" alt="" data-src="assets/img/avatar.jpg" data-src-retina="assets/img/avatar.jpg" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="edituser.html"><i class="pg-settings_small"></i> Settings</a>
                </li>
               
                <li class="bg-master-lighter">
                  <a href="logout.php" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          </div>

          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <div class="social-wrapper">
            <div class="social " data-pages="social">
              <!-- START JUMBOTRON -->
              <div class="JUMBOTRON"  style="height: 90px">
              </div>
              <!-- END JUMBOTRON -->
              <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-heading" style="text-align: center;">
                            <div class="panel-title" style="font-size: 16px">Analysis Results</div>
                      </div>
                      <div class="panel-body" >
                         <table >
                         <tr><td><h4>Seasonal Analysis</h4></td><td></td></tr>
                         <tr><td></td><td></td></tr>
 <tr><td><div class="progress-bar " data-percent="<?php echo ceil($percent1); ?>" ></div><td/>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td>
 <ul>
 <li><?php echo $list[0]; ?></li>
 <li><?php echo $list[1]; ?></li>
 <li><?php echo $list[2]; ?></li>
 </ul>
 
 
 </td></tr></table>
 <hr/>
	<table>
    <tr><td><h4>Rainfall Analysis</h4></td><td></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td><div class="progress-bar " data-percent="<?php echo ceil($percent2); ?>" ></div></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <ul>
    <li><?php echo $list[3]; ?></li>
    <li><?php echo $list[4]; ?></li>
    </ul>
    </td></tr></table><hr/>
	<table>
    <tr><td><h4>Temperature Analysis</h4></td><td></td></tr>
     <tr><td></td><td></td></tr>
    <tr><td><div class="progress-bar " data-percent="<?php echo ceil($percent3); ?>" ></div></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><ul>
    <li><?php echo $list[5]; ?></li>
    </ul></td></tr></table>
	</table><br/>
	<!--input type="submit" value="reload"-->
	<script>
		$(".progress-bar").loading();
		$('input').on('click', function () {
			 $(".progress-bar").loading();
		});
	</script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">
                              <h3>
                                  <span class="semi-bold">Overall Yield </span></h3>
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
						    <table >
                         <tr><td></td><td></td></tr>
                         <tr><td></td><td></td></tr>
 <tr><td><div class="progress-bar " data-percent="<?php 
 
 
 echo ceil((ceil($percent1)+ceil($percent2)+ceil($percent3))/3); 
 if((ceil($percent1)+ceil($percent2)+ceil($percent3))/3 >= 80)
	 $result =" HIGH";
 else if((ceil($percent1)+ceil($percent2)+ceil($percent3))/3 <= 50)
	 $result ="LOW";
 else 
	 $result ="MODERATE";
 ?>" ></div><td/>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td>
  <span><h3><?php echo $result;?></h3></span>
 
 </td></tr></table>
 <br/>
	<!--input type="submit" value="reload"-->
	<script>
		$(".progress-bar").loading();
		$('input').on('click', function () {
			 $(".progress-bar").loading();
		});
	</script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

						  </div>
                </div>
                
              </div>

              <!-- END CONTAINER FLUID -->
            </div>
            <!-- /container -->
          </div>
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg footer">
          
        </div>
        
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!--START QUICKVIEW -->
    
    <!-- END QUICKVIEW-->
    <!-- START OVERLAY -->
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
   <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/utils.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/models/line.js" type="text/javascript"></script>
    <script src="assets/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
    <script src="assets/plugins/mapplic/js/hammer.js"></script>
    <script src="assets/plugins/mapplic/js/jquery.mousewheel.js"></script>
    <script src="assets/plugins/mapplic/js/mapplic.js"></script>
    <script src="assets/plugins/rickshaw/rickshaw.min.js"></script>
    <script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN VENDOR JS -->
     
        
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    

    <script type="text/javascript" src="assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>

    

      <script src="assets/js/portlets.js" type="text/javascript"></script>
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    
     <!-- END PAGE LEVEL JS -->
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>   
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.8/angular-filter.min.js"></script>
      <script >
      var mynote=angular.module("myList",['angular.filter']);
      function loadJSON(callback) {

          var xobj = new XMLHttpRequest();
          xobj.overrideMimeType("application/json");
          xobj.open('GET', 'tags.json', true);
          xobj.onreadystatechange = function() {
              if (xobj.readyState == 4 && xobj.status == "200") {
                 callback(xobj.responseText);
              }
          }
          xobj.send(null);

      }
      mynote.controller('ListsController',function($scope,$window){
        
        $scope.lists=[];
        $scope.listsss=[];
        $scope.init=function(){
            //console.log("initialised");
          loadJSON(function(response) {
            $scope.listsss = JSON.parse(response);
            $scope.lists=$scope.listsss.tags;
           // console.log("L1: "+$scope.lists);
          });
        }

     });
      </script>


  </body>
</html>