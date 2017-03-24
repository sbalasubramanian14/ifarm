<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION["username"]))
{
  header("refresh:0;index.php");
}

include('connect.php');


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
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/codrops-stepsform/css/component.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/themes/simple.css" rel="stylesheet" type="text/css" />
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
              <div align="center" class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20 ">
                <div class="panel panel-transparent">
                      <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
                        <li class="">
                          <a data-toggle="tab" href="#tab1" aria-expanded="false">View Summary</a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#tab2" aria-expanded="false">View Task</a>
                        </li>
                        <li class="active">
                          <a data-toggle="tab" href="#tab3" aria-expanded="true">Add a Task</a>
                        </li>
                      </ul>
                      <div class="tab-content bg-white">
                        <div class="tab-pane" id="tab1">
                          <div class="row column-seperation">
                            <div class="col-md-6">
                              <h3>
                                        <span class="semi-bold">Sometimes </span>Small things in life
                                        means the most
                                      </h3>
                            </div>
                            <div class="col-md-6">
                              <h3 class="semi-bold">
                                        great tabs
                                      </h3>
                              <p>Native boostrap tabs customized to Pages look and feel, simply changing class name you can change color as well as its animations</p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                         <div class="panel panel-transparent">
                          <div class="panel-heading">
                            <div class="panel-title">Pages Default Tables Style
                            </div>
                            <div class="pull-right">
                              <div class="col-xs-12">
                                <input id="search-table" class="form-control pull-right" placeholder="Search" type="text">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="panel-body">
                            <div id="tableWithSearch_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="table-responsive"><table class="table table-hover demo-table-search dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
                              <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Title</th><th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" style="width: 221px;" aria-label="Places: activate to sort column ascending">Places</th><th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" style="width: 244px;" aria-label="Activities: activate to sort column ascending">Activities</th><th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" style="width: 139px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="tableWithSearch" rowspan="1" colspan="1" style="width: 186px;" aria-label="Last Update: activate to sort column ascending">Last Update</th></tr>
                              </thead>
                              <tbody>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                              <tr role="row" class="odd">
                                  <td class="v-align-middle semi-bold sorting_1">
                                    <p>A day to remember</p>
                                  </td>
                                  <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                                    <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>UK was on top of the art world 18-19 century had the best food, best cloths and best entertainment back then) it was a hyper nation</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>Public</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>April 13,2014 10:13</p>
                                  </td>
                                </tr><tr role="row" class="even">
                                  <td class="v-align-middle semi-bold sorting_1">
                                    <p>Among the children</p>
                                  </td>
                                  <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                                    <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>you want English, Scottish, Welsh, Irish, British, European or UK even a British (name other original country you came form or have roots to E.G. A British Japanese or a 5th generation
                                    </p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>Public</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>April 13,2014 10:13</p>
                                  </td>
                                </tr><tr role="row" class="odd">
                                  <td class="v-align-middle semi-bold sorting_1">
                                    <p>First Tour</p>
                                  </td>
                                  <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                                    <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>Public</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>April 13,2014 10:13</p
                                </tr><tr role="row" class="even">>
                                  </td>
                                  <td class="v-align-middle semi-bold sorting_1">
                                    <p>First Tour</p>
                                  </td>
                                  <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                                    <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>Public</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>April 13,2014 10:13</p>
                                  </td>
                                </tr><tr role="row" class="odd">
                                  <td class="v-align-middle semi-bold sorting_1">
                                    <p>First Tour</p>
                                  </td>
                                  <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                                    <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>Public</p>
                                  </td>
                                  <td class="v-align-middle">
                                    <p>April 13,2014 10:13</p>
                                  </td>
                                </tr></tbody>
                            </table></div><div class="row"><div><div class="dataTables_paginate paging_simple_numbers" id="tableWithSearch_paginate"><ul class=""><li class="paginate_button previous disabled" id="tableWithSearch_previous"><a href="#" aria-controls="tableWithSearch" data-dt-idx="0" tabindex="0"><i class="pg-arrow_left"></i></a></li><li class="paginate_button active"><a href="#" aria-controls="tableWithSearch" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="tableWithSearch" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="tableWithSearch" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button next" id="tableWithSearch_next"><a href="#" aria-controls="tableWithSearch" data-dt-idx="4" tabindex="0"><i class="pg-arrow_right"></i></a></li></ul></div><div class="dataTables_info" id="tableWithSearch_info" role="status" aria-live="polite">Showing <b>1 to 5</b> of 12 entries</div></div></div></div>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane active" id="tab3">
                          <h3>
                                    Follow us &amp; get updated!
                                  </h3>
                          <p>
                            Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.
                          </p>
                          <br>
                        </div>
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
    <!--START QUICKVIEW -->
    </div>
    <!-- END PAGE CONTAINER -->
    
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
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
     <!-- END PAGE LEVEL JS -->
  </body>
</html>