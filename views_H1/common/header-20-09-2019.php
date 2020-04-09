<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Hey Send</title>
      <meta content="Admin Dashboard" name="description" />
      <meta content="Mannatthemes" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="shortcut icon" href="<?php base_url();?>/<?php base_url();?>/assets/images/favicon.ico">
      <!-- DataTables -->
      <link href="<?php base_url();?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php base_url();?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <script src="<?php base_url();?>/assets/js/jquery.min.js"></script>
      <link href="<?php base_url();?>/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!-- Multi Select -->
      <link href="<?php base_url();?>/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
      <link href="<?php base_url();?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php base_url();?>/assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="<?php base_url();?>/assets/css/style.css" rel="stylesheet" type="text/css">
      <link href="<?php base_url();?>/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />
      <script src="<?php base_url();?>/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
      <script src="<?php base_url();?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
      <script src="<?php base_url();?>/assets/plugins/select2/js/select2.full.min.js"></script>
      <script src="<?php base_url();?>/assets/custom.js"></script>
      <link href="<?php base_url();?>/assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
      <link href="<?php base_url();?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <script src="<?php base_url();?>/assets/plugins/moment/moment.js"></script>
      <script src="<?php base_url();?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="<?php base_url();?>/assets/plugins/parsleyjs/parsley.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
             $('form').parsley();
         });
      </script>
   </head>
   <body>
      <?php if(isset($navigation) && $navigation == 0){} else { ?> 
      <!-- Loader -->
      <div id="preloader">
         <div id="status">
            <div class="spinner"></div>
         </div>
      </div>
      <!-- Navigation Bar-->
      <header id="topnav">
         <div class="topbar-main">
            <div class="container-fluid">
               <!-- Logo container-->
               <div class="logo">
                  <a href="<?php base_url();?>/admin/dashboard" class="logo">
                  <i class="mdi mdi-bowling text-success mr-1"></i> <span class="hide-phone">Zoogler</span>
                  </a>
               </div>
               <!-- End Logo container-->
               <div class="menu-extras topbar-custom">
                  <ul class="list-unstyled float-right mb-0">
                     <!-- language-->
                     <!--<li class="dropdown notification-list hide-phone">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            English <img src="<?php base_url();?>/assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right language-switch">
                            <a class="dropdown-item" href="#"><img src="<?php base_url();?>/assets/images/flags/italy_flag.jpg" alt="" height="16"/><span> Italian </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php base_url();?>/assets/images/flags/french_flag.jpg" alt="" height="16"/><span> French </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php base_url();?>/assets/images/flags/spain_flag.jpg" alt="" height="16"/><span> Spanish </span></a>
                            <a class="dropdown-item" href="#"><img src="<?php base_url();?>/assets/images/flags/russia_flag.jpg" alt="" height="16"/><span> Russian </span></a>
                        </div>
                        </li>-->
                     <!-- notification-->
                     <!--<li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-mail noti-icon"></i>
                            <span class="badge badge-danger noti-icon-badge">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
                            <div class="dropdown-item noti-title">
                                <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                            </div>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="<?php base_url();?>/assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="<?php base_url();?>/assets/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="<?php base_url();?>/assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                View All
                            </a>
                        
                        </div>
                        </li>
                        
                        <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-success noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
                            <div class="dropdown-item noti-title">
                                <h5>Notification (3)</h5>
                            </div>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>
                        
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                View All
                            </a>
                        
                        </div>
                        </li>-->
                     <!-- User-->
                     <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                        <img src="<?php base_url();?>/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown  border-0">
                           <!-- item-->
                           <div class="dropdown-item noti-title">
                              <h5>Welcome</h5>
                           </div>
                           <a class="dropdown-item" href="<?php base_url();?>/<?php echo $_SESSION['type']; ?>/settings"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                           <a class="dropdown-item" href="<?php base_url();?>/<?php echo $_SESSION['type']; ?>/auth/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                        </div>
                     </li>
                     <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                           <div class="lines">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                        </a>
                        <!-- End mobile menu toggle-->
                     </li>
                  </ul>
               </div>
               <!-- end menu-extras -->
               <div class="clearfix"></div>
            </div>
            <!-- end container -->
         </div>
         <!-- end topbar-main -->
         <!-- MENU Start -->
         <div class="navbar-custom">
            <div class="container-fluid">
               <div id="navigation">
                  <!-- Navigation Menu-->
                  <ul class="navigation-menu">
                     <li class="has-submenu">
                        <a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/dashboard"><i class="dripicons-device-desktop"></i>Dashboard</a>
                     </li>
                     <?php if(isset($_SESSION['admin']['role_id']) && $_SESSION['admin']['role_id']==1) { 
                        $name  = "Admin"; 
                        } 
                         else if(isset($_SESSION['admin']['role_id']) && $_SESSION['admin']['role_id']==2) {
                            $name = "Reseller"; 
                            } 
                        else { 
                        $name = "Clients"; 
                        }  
                        ?>
                     <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ ?>
                     <?php if(isset($_SESSION['auth-permission']['users']) && in_array('index' , $_SESSION['auth-permission']['users'] ) ) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="dripicons-jewel"></i><?php echo $name;?></a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/users/"><?php echo $name;?></a></li>
                                 <!--<li><a href="<?php //echo base_url() ?><?php //echo $_SESSION['type'];?>/users/role">User Role</a></li>-->
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php if(isset($_SESSION['auth-permission']['clients']) && in_array('index' , $_SESSION['auth-permission']['clients'] ) ) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-user-astronaut"></i>Clients</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/clients">Client</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php if(isset($_SESSION['auth-permission']['domains']) && in_array('index' , $_SESSION['auth-permission']['domains'] ) ) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-cogs"></i>Domains</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/domains">Domains</a></li>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/domains/index-track-domains">Tracking Domains</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php if(isset($_SESSION['auth-permission']['servers']) && in_array('index' , $_SESSION['auth-permission']['servers'] ) ) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-server"></i>Servers</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/servers/index-bounce-server">Bounce Server</a></li>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/servers/index-delivery-server">Delivery Server</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php if(isset($_SESSION['auth-permission']['reports']) && in_array('index' , $_SESSION['auth-permission']['reports'])) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="dripicons-graph-bar"></i>Reports</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/reports/index">Campaigns Reports</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php if(isset($_SESSION['auth-permission']['global-setting']) && in_array('index' , $_SESSION['auth-permission']['global-setting'])) { ?>
                     <li class="has-submenu">
                        <a href="#"><i class="fab fa-sith"></i>Global Setting</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/global-setting/index-setting">Global Setting</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                     <?php }else{ ?>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-clipboard-list"></i>Lists</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/lists">List</a></li>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/segments">List Subscriber</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-people-carry"></i>Campaigns</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/campaigns">Campaigns</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="has-submenu">
                        <a href="#"><i class="dripicons-graph-bar"></i>Reports</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/reports/index">Campaigns Reports</a></li>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/reports/client-daily-report
                                    ">Client Daily Report</a></li>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/reports/client-month-report
                                    ">Client Month Report</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="has-submenu">
                        <a href="#"><i class="fas fa-list"></i>Blacklist</a>
                        <ul class="submenu megamenu">
                           <li>
                              <ul>
                                 <li><a href="<?php echo base_url() ?><?php echo $_SESSION['type'];?>/blacklists">Blacklist</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <?php } ?>
                  </ul>
                  <!-- End navigation menu -->
               </div>
               <!-- end #navigation -->
            </div>
            <!-- end container -->
         </div>
         <!-- end navbar-custom -->
      </header>
      <!-- End Navigation Bar-->
      <?php } ?>