<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sathi Planners Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('public/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo base_url('public/dist/css/skins/skin-blue.min.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
    <script src="<?php echo base_url('public/js/formSubmission.js'); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
      
      #progress_container {
        width: 100%;
        height: 100%;
        z-index: 10000;
        display: block;
        background: rgba(20,20,20,.81);
        position: fixed;
        text-align: center;
      }
      
      #loader {
        width: 100px;
        height: 100px;
        margin-top: 25%;
      }
    </style>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="dashboard.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sathi</b>Planners</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url('public/dist/img/SP_Logo_small.png'); ?>" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs" id="user_logged_in"><?php echo $this->session->userdata('name');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img id="user_logged_in_img" src="<?php echo base_url('public/dist/img/SP_Logo_small.png'); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('type');?>
                      <small>Last Login : <?php echo date('Y-m-d H:i:s',strtotime($this->session->userdata('lastLogin')->format('Y-m-d H:i:s')));?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
                </ul>
            </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public/dist/img/SP_Logo_small.png'); ?>" class="img-circle" alt="Sathi Planners" />
            </div>
            <div class="pull-left info">
              <p>Admin Portal</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Live</a>
            </div>
          </div>
          
          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Operations</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a class="navigationAjax" href="dashboard/render"><i class='fa fa-home'></i> <span>Home</span></a></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-plus"></i>
                <span>Applicant</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="applicant"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                <li><a class="navigationAjax" href="applicant/getall"><i class="fa fa-th-list"></i> View</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Plan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="plan"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                <li><a class="navigationAjax" href="plan/getall"><i class="fa fa-th-list"></i> View</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>Mines</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="mines"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                <li><a class="navigationAjax" href="mines/getall"><i class="fa fa-th-list"></i> View</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open-o"></i>
                <span>Documents</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="documents"><i class="fa fa-paperclip"></i> Attach</a></li>
                <li><a class="navigationAjax" href="documents/getall"><i class="fa fa-th-list"></i> View</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-eye"></i>
                <span>Events</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="events"><i class="fa fa-paperclip"></i> Add New</a></li>
                <li><a class="navigationAjax" href="events/getall"><i class="fa fa-th-list"></i> View</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-rupee"></i>
                <span>Payments</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="navigationAjax" href="payment"><i class="fa fa-paperclip"></i> Receive</a></li>
                <li><a class="navigationAjax" href="payment/getall"><i class="fa fa-th-list"></i> Pay</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sathi Planners Admin Portal
            <small>Control your world right here...</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Applicant</li>
          </ol>
        </section>
		<!-- Main content -->
		<section class="content">
		<!-- Your Page Content Here -->
		<section class="content" id="replacable">
			<!-- Small boxes (Stat box) -->
			<!-- content -->