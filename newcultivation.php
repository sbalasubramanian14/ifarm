<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION["username"]))
{
  header("refresh:0;index.php");
}

include('connect.php');
$user=$_SESSION["username"];

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
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />


     <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/codrops-stepsform/css/component.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/themes/simple.css" rel="stylesheet" type="text/css" />

   
    <!--[if lte IE 9]>
  <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
  <![endif]-->
  </head>
  <body class="fixed-header no-header" ng-app='myList'>
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
                <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo
.png" width="78" height="22">
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
                <li><a href="edituser.php"><i class="pg-settings_small"></i> Settings</a>
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
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo
.png" width="78" height="22">
            </div>
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10 ">
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
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <div class="social-wrapper">
            <div class="social " data-pages="social">
              <!-- START JUMBOTRON -->
              <div class="JUMBOTRON"  style="height: 90px"></div>
              <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                  <div class="panel">
                      <div class="panel-heading" style="text-align: center;">
                            <div class="panel-title" style="font-size: 16px">New Cultivation Registration</div>
                      </div>
                      <div class="panel-body">
                         <div class="row">
                            <div class="col-sm-12">
                              <h3 style="font-style: italic;text-align: center;font-weight: bold;color: green">"Wish you all the best for a wonderful harvest"</h3>
                              <hr>  
                              <p style="font-family: 'Montserrat'">Please enter the details of the new crop cultivation</p>
                            </div>

                          </div>
                          <div class="row" ng-controller="ListsController">
                            <div class="col-sm-12" ng-init="init()">
                               <form id="form-work" action="cultivationaction.php" method="get " class="form-horizontal" role="form" autocomplete="off">
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-3 control-label">Land Survey No.</label>
                                    <div class="col-sm-9">
 <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" id="land" name="land" required>
                                      <option value="">-Survey No.-</option>
                <?php
                  $result = pg_query($db,"SELECT * FROM ifarm.land where uid = '$user'");
              
              while ($row = pg_fetch_assoc($result)) {
                $land_no = $row['land_no'];
                 echo  "<option value=". $land_no.">. $land_no.</option>";
                                      
              }
              ?></select> 
                                     
                                     
                                      <!--input type="text" class="form-control" id="land" placeholder="Survey No." name="land" required-->
                                    </div>
                                  </div>

                                  <input type="hidden" name="crop" value="{{selectedItem.crop}}" required>
                                  <input type="hidden" name="variety" value="{{selectedVar.variety}}" required>
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-3 control-label ">Crop</label>
                                    <div class="col-sm-9">
                                    <!--  <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" id="json-one" name="crop" required>
                                          <option value="">-select-</option>
                                          <option value="paddy">paddy</option>
                                          <option value="wheat">wheat</option>
                                          <option value="millet">millet</option>
                                          <option value="maize">maize</option>
                                          <option value="cotton">cotton</option>
                                          <option value="brinjal">brinjal</option>
                                      </select> 
                                      -->
                                      <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" id="json-one" name="cropbox" required  ng-model="selectedItem" ng-options="list.crop for list in lists  | unique:'crop'" >    </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="fname" class="col-sm-3 control-label ">Variety</label>
                                    <div class="col-sm-9">
                                     <!-- <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" id="json-two" required  name="variety">
                                          <option value="">-select-</option>
                                          <option value="paddy">paddy</option>
                                          <option value="wheat">wheat</option>
                                          <option value="millet">millet</option>
                                          <option value="maize">maize</option>
                                          <option value="cotton">cotton</option>
                                          <option value="brinjal">brinjal</option>
                                      </select> 
                                      -->
                                      <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" id="json-two" required  name="varietybox" ng-model="selectedVar" ng-options="list.variety for list in lists | filter: {crop: selectedItem.crop}" ></select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-3 control-label">Quantity of Seeds used</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="area" name="seedsqty" placeholder="kgs of seeds used" name="seedqty" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-3 control-label ">Date of Plantation</label>
                                    <div class="col-sm-9">
                                          <div id="datepicker-component" class="input-group date col-sm-8">
                                               <input type="text" name="date" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                          </div>
                                    </div>
                                  </div> 
                                  <div class="form-group" align="center">
                                        <button class="btn btn-success" type="submit">Register</button>

                                  </div>

                               </form>
                            </div>
                          
                          </div>

                      </div>
                  </div>

                
              </div>
              <!-- END JUMBOTRON -->
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
        <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

    <script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/jquery.linkedSelect.min.js"></script>

    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
     <!-- BEGIN PAGE LEVEL JS -->
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


    
    
      
         <script src="assets/js/form_elements.js" type="text/javascript"></script>

    <script src="assets/js/form_layouts.js" type="text/javascript"></script>
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    
    <!-- END PAGE LEVEL JS -->
  </body>
</html>