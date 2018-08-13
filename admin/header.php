<?php
   session_start();
     include("../dbconfig.php");
   extract($_REQUEST);
   $email=$_SESSION["email"];
   //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

   //$role = $_SESSION["role"];
   $timeout = 100; // Set timeout minutes
   //$logout_redirect_url = "../index.php"; // Set logout URL
   
   $timeout = $timeout * 60; // Converts minutes to seconds
   if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
      echo "<script>window.location.assign('index.php')</script>";
    }
    else
   {
     $_SESSION['start_time'] = time();
    }
   }
   
   if(!isset($_SESSION['email']))
   {
   header("location:index.php");
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title> M Users| Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
     <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!--Time picker-->
   <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
   </head>
     <body class="hold-transition skin-blue sidebar-mini">
         <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><b>M</b>Us</span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b>MultiUsers</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/MultiUsers.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">MultiUsers</span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- User image -->
                           <li class="user-header">
                              <img src="dist/img/MultiUsers.png" class="img-circle" alt="User Image">
                              <p>
                                 <?php echo $email;?>
                              </p>
                           </li>
                           <!-- Menu Body -->
                           <li class="user-body">
                              <!-- /.row -->
                           </li>
                           <!-- Menu Footer-->
                           <li class="user-footer">
                              <div class="pull-left">
                                 <a href="myProfile.php" class="btn btn-default btn-flat">Settings</a>
                              </div>
                              <div class="pull-right">
                                 <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->