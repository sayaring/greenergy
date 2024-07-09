<?php
$this->common->setGlobalSettingsData();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo NAME . ' :: ' . $pageTitle; ?></title>
    <link rel="icon" type="image/png" sizes="56x56" href="<?php echo base_url('uploads/logo/' . FAVICON); ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datetimepicker.min.css">
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!-- <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">

        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>administrator/loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>administrator/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
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
          <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>

            <?php
if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
	?>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/generalsetting">
                <i class="fa fa-wrench"></i>
                <span>General Setting</span>
              </a>
            </li>
             
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/category">
                <i class="fa fa-list"></i>
                <span>Category</span>
              </a>
            </li> 
             <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/subcategory">
                <i class="fa fa-list"></i>
                <span>Sub Category</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/products">
                <i class="fa fa-list"></i>
                <span>Products</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/projects">
                <i class="fa fa-list"></i>
                <span>Projects & Industries</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/gallery">
                <i class="fa fa-upload"></i>
                <span>Product Gallery</span>
              </a>
            </li>
            <!-- <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/news">
                <i class="fa fa-list"></i>
                <span>News</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/notifications">
                <i class="fa fa-list"></i>
                <span>Notifications</span>
              </a>
            </li> -->
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/blogs">
                <i class="fa fa-list"></i>
                <span>Blogs</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/review">
                <i class="fa fa-list"></i>
                <span>Our Clients Review</span>
              </a>
            </li> 
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/client">
                <i class="fa fa-list"></i>
                <span>Clients</span>
              </a>
            </li> 
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/professional">
                <i class="fa fa-list"></i>
                <span>Professional</span>
              </a>
            </li> 
           
           
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/content">
                <i class="fa fa-list"></i>
                <span>Contents</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/banner">
                <i class="fa fa-picture-o"></i>
                <span>Banners</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/query-list">
                <i class="fa fa-list"></i>
                <span>Query List</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>administrator/emailtemplate">
                <i class="fa fa-envelope-o"></i>
                <span>Email Template</span>
              </a>
            </li>
            <?php
}
?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>