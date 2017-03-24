
<?php 
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:index.php");
}

include('connect.php');
$uid=$_SESSION["username"];

?>
<!DOCTYPE html>
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


    <style type="text/css">
      .td-title{
        font-weight:bold;
       
      }
    </style>

    
    <!--[if lte IE 9]>
  <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
  <![endif]-->
  </head>
  <body class="fixed-header no-header">
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
    </nav><!-- END SIDEBAR -->
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
          <!-- Modal -->
          <div class="modal fade slide-up disable-scroll" id="editinfo" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5><span class="semi-bold">Modify </span> Info </h5>
                    <p class="p-b-10">Please Change your basic information here.</p>
                  </div>
                  <div class="modal-body">
                    <form role="form">
                      <div class="form-group-attached">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Name</label>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Email</label>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          
                        </div>
                        
                      </div>
                      <div class="row">
                      
                        <div class="col-sm-4 m-t-10 sm-m-t-10">
                          <button type="submit" class="btn btn-primary  btn-block m-t-5">Modify</button>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
          <!-- /.modal-dialog -->
          
          <!-- Modal -->
          <div class="modal fade slide-up disable-scroll" id="editpwd" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5><span class="semi-bold">Change  </span> Password </h5>
                    <p class="p-b-10">Please Change your login password here.</p>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="changepwd.php" method="post">
                      <div class="form-group-attached">
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Old Password</label>
                              <input type="password" name='opwd' class="form-control">
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>New Password</label>
                              <input type="password" name="npwd" class="form-control">
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Confirm Password</label>
                              <input type="password" class="form-control">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="row">
                      
                        <div class="col-sm-4 m-t-10 sm-m-t-10">
                          <button type="submit" class="btn btn-primary  btn-block m-t-5">Update</button>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
          <!-- /.modal-dialog -->
          <!-- Modal -->
          <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5><span class="semi-bold">Land</span> Registration </h5>
                    <p class="p-b-10">We need payment information inorder to process your order</p>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="add_land.php" method="post">
                      <div class="form-group-attached">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Survey Number</label>
                              <input type="text" name="land_no" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="form-group form-group-default">
                              <label>Area (in Hectares)</label>
                              <input type="text" name="area" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group form-group-default">
                              <label>Soil</label>
                              <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" required  name="type">
                                          <option value="">-select-</option>
                                          <option value="black">Black Soil</option>
                                          <option value="red">Red Soil</option>
                                          <option value="alluvial">Alluvial Soil</option>
                                          <option value="laterite">Laterite Soil</option>
                                          
                              </select> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      
                        <div class="col-sm-4 m-t-10 sm-m-t-10">
                          <button type="submit" class="btn btn-primary  btn-block m-t-5">ADD</button>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
          <!-- /.modal-dialog -->
          <div class="social-wrapper">
            <div class="social " data-pages="social">
              <!-- START JUMBOTRON -->
              <div class="JUMBOTRON"  style="height: 90px"></div>
              <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                


                  <div class="panel" >
                      
                      <div class="panel-body">
                          
                         <div class="row">
                            <div class="col-sm-6 m-t-30" align="left">
                              <p style="font-size: 48px;color: green">Profile</h1><br><hr>
                              <font style="font-family: 'Montserrat';font-style: italic;font-size: 15px;">Your Details are displayed here... You can modify changes if any. </font>  <br><br>
                              
                                  <button class="btn btn-success btn-cons  m-b-10" data-toggle="modal" data-target="#editinfo" type="button"><i class="fa fa-paste"></i> <span class="bold">Edit info</span>
                                  </button>
                                  <button class="btn btn-success btn-cons  m-b-10" data-toggle="modal" data-target="#editpwd" type="button"><i class="fa fa-paste"></i> <span class="bold">Change Password</span>
                                  </button>
                              
                   


                            </div>
                            

                        <?php 
                         $user = $_SESSION['username'];


                         $result = pg_query($db,"SELECT * FROM ifarm.users where username = '$user'");
                         if($row = pg_fetch_assoc($result)){
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                         } 

                         ?>
                            <div class="col-sm-6">
                              <table class="table table-hover ">
                              <tbody>
                                <tr>
                                  <td class="td-title">Name</td>
                                  <td><?php echo $fname." ".$lname?></td>
                                </tr>
                                <tr>
                                  <td class="td-title">Current crops</td>
                                  <td>Paddy</td>
                                </tr>
                                <tr>
                                  <td class="td-title">Email</td>
                                  <td><?php echo $user ?></td>
                                </tr>
                                

                              </tbody>
                              </table>
                            </div>
                            
                          </div>

                      </div>
                  </div>
                  
                  <div class="row">
                    <h1 align="center">Lands Owned
                       
                       <button class="btn btn-success btn-cons pull-right m-b-10 " id="btnToggleSlideUpSize" type="button"><i class="fa fa-plus"></i> <span class="bold">ADD</span>
                    </h1>
                    
                      
                    
                  </div>
                  <div class="widgets-container sm-p-r-20 sm-p-l-20" style="align-content: center;">
              <?php
              $result = pg_query($db,"SELECT * FROM ifarm.land where uid = '$user'  AND uid='$uid'");
              while ($row = pg_fetch_assoc($result)) {
                $land_no = $row['land_no'];
                # code...
              ?>
                    <div class="col-md-3  m-b-10">
                      <div class="ar-1-1">
                      <!-- START WIDGET widget_plainWidget-->
                        <div class="panel no-border bg-master widget widget-6 widget-loader-circle-lg no-margin">
                            <div class="panel-heading">
                              <h3><?php echo $row['land_no']?></h3>
                            </div>
                            <div class="panel-body">
                              <div class=" bottom-left bottom-right padding-25">
                                <h1 class="text-white semi-bold"><?php echo $row['area'].' Hectares' ?></h1>
                                <span class="label font-montserrat fs-11"><?php echo $row['soil'].' soil'?></span>
                                <h3 class="text-white m-t-20">
                                <?php
                                  $cropres = pg_query($db,"SELECT * FROM ifarm.cultivation where land_no = '$land_no'");

                                  $rowcrop = pg_fetch_assoc($cropres);

                                  if($rowcrop['status'] == 0){
                                    echo $rowcrop['crop'];

                                  }else{
                                    echo 'currently not cultivated!';
                                  }

                                ?>
                                </h3>
                                <p class="text-white hint-text m-t-30">
                                <?php
                                  if($rowcrop['status'] == 0){
                                    echo $rowcrop['date'];

                                  }else{
                                    echo 'currently not cultivated!';
                                  } 

                                ?>
                                 </p>
                              </div>
                            </div>
                          </div>
                          <!-- END WIDGET -->
                        </div>
                    </div>
              <?php
                }
               ?>
                     
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
     <!-- BEGIN PAGE LEVEL JS -->

      
    <script src="assets/js/form_elements.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>
    <script src="assets/js/form_layouts.js" type="text/javascript"></script>
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    
    <!-- END PAGE LEVEL JS -->
  </body>
</html>