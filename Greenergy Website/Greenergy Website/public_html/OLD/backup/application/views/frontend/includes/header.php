<?php
$contentIdListFooter = [8,7];
$contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
$categoryDetails = $this->common->categoryDetails();
$blogDetails = $this->common->blogDetails();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    
       <title><?php echo !empty($pageTitle) ? $pageTitle : "Greenergy Solution Pvt. Ltd. - An Engineeringsolution Company "; ?></title>
         <meta name="author" content="<?php echo NAME; ?>">
        <meta name="title" content="<?php echo !empty($metaTitle) ? $metaTitle : NAME; ?>">
        <meta name="keywords" content="<?php echo !empty($metaKeywords) ? $metaKeywords : NAME; ?>">
        <meta name="description" content="<?php echo !empty($metaDescription) ? $metaDescription : NAME; ?>">
        <!-- All Plugins Css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/assets/css/plugins.css">
     
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('uploads/logo/'.FAVICON); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/'.FAVICON); ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/'.FAVICON); ?>" sizes="16x16">
  
<link href="<?php echo base_url(); ?>assets/web/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/web/assets/css/style.css" rel="stylesheet">
<!-- Responsive File -->
<link href="<?php echo base_url(); ?>assets/web/assets/css/responsive.css" rel="stylesheet">
<!-- Color File -->
<link href="<?php echo base_url(); ?>assets/web/assets/css/color-2.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&amp;family=Mukta:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<style>@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
     .isa_info, .isa_success, .isa_warning, .isa_error {margin: 10px 0px;padding:12px; }
     .isa_info {    color: #00529B;    background-color: #BDE5F8;}
     .isa_success {    color: #4F8A10;    background-color: #DFF2BF;}
     .isa_warning {    color: #9F6000;    background-color: #FEEFB3;}
     .isa_error {    color: #D8000C;    background-color: #FFD2D2;}
     .isa_info i, .isa_success i, .isa_warning i, .isa_error i {    margin:10px 22px;    font-size:2em;    vertical-align:middle;}
     .submit_btn {
          background: #97CD17 !important;
          color: #fff !important;
          border-radius: 0px;
          border: none;
          width: 160px;
          padding: 0px;
          height: 52px;
          text-transform: uppercase;
          font-size: 14px !important;
          letter-spacing: .28px !important;
          font-family: "Montserrat", sans-serif;
          font-weight: 600 !important;
          line-height: 50px;
          position: relative;
          z-index: 2;
          -webkit-transition: all 300ms linear 0s;
          -o-transition: all 300ms linear 0s;
          transition: all 300ms linear 0s;
          font-weight: 600;
          outline: none !important;
          -webkit-box-shadow: none !important;
          box-shadow: none !important;
          display: inline-block;
          border: 2px solid #97CD17;
        }

        .submit_btn:hover, .submit_btn:focus {
          color: #97CD17 !important;
          border-color: #97CD17 !important;
          background: transparent !important;
        }
    </style>
</head>
<body>
<body class="theme-color-two">

<div class="page-wrapper">

    <!--====== Header Start ======-->
    <?php
      $firstUrl = $this->uri->segment(1);
      if($firstUrl=="oldheader" || $firstUrl=="hellooldheader-backup"){
    ?>
        <header class="main-header header-style-two">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/logo/'.IMAGE); ?>" alt=""></a></div>
                    </div>
                    <div class="right-column">
                        <div class="contact-info">
                            <div class="single-contact-info">
                                <div class="icon"><span class="flaticon-geolocation"></span></div>
                                <h4>Offices</h4>
                                <div class="text">Kolkata, Siliguri, GUW</div>
                            </div>
                            <div class="single-contact-info">
                                <div class="icon"><span class="flaticon-call"></span></div>
                                <h4>Phone</h4>
                                <div class="text"><a href="tel:<?php echo PHONE; ?>"><?php echo PHONE; ?></a></div>
                            </div>
                            <div class="single-contact-info">
                                <div class="icon"><span class="flaticon-correspondence"></span></div>
                                <h4>Email</h4>
                                <div class="text"><a href="mailto:<?php echo EMAIL; ?>"><?php echo EMAIL; ?></a></div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Header Lower -->
        <div class="header-lower">
            <div class="auto-container">
                <div class="wrapper-box">
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/logo/'.IMAGE); ?>" alt=""></a></div>
                        </div>
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-4.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                              <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
                                    <li class="dropdown"><a href="#">Products</a>
                                        <ul>
                                          <?php
                                          if(!empty($categoryDetails)){

                                            foreach ($categoryDetails as $categoryList) {
                                              $categoryId= !empty($categoryList->id) ? $categoryList->id :'';
                                            $categoryUrl= !empty($categoryList->link) ? $categoryList->link :'';
                                          ?>
                                            <li class="dropdown"><a href="#"><?php echo !empty($categoryList->name) ? $categoryList->name :''; ?></a>
                                                 <?php 
                                                    $subCategoryDetails = $this->common->subCategoryDetails($categoryId);
                                                      if(!empty($subCategoryDetails) && count($subCategoryDetails) > 0){
                                                   ?>     
                                                <ul>
                                                  <?php 
                                                   
                                                        foreach ($subCategoryDetails as $subCategoryList) {
                                                          $subCategoryUrl= !empty($subCategoryList->link) ? $subCategoryList->link :'';
                                                    $url = base_url('products/'.$categoryUrl.'/'.$subCategoryUrl);
                                                  ?>
                                                    <li><a href="<?php echo $url; ?>"><?php echo !empty($subCategoryList->name) ? $subCategoryList->name :''; ?></a></li>
                                                  <?php
                                                    }
                                                  ?>  
                                                </ul>
                                                <?php 
                                                     
                                                    }
                                                  ?>  
                                            </li>
                                            <?php
                                                }
                                              }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('projects'); ?>">Recent Projects</a></li>
                                    <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                                    <li><a href="http://greenergysolution.in/gspl-projects.pdf">Projects Executed</a></li>
                                    <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="navbar-right-info">
                        <div class="side-menu-nav sidemenu-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-4.png" alt=""></div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-lower">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-3.png" alt=""></div>
    
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                        </div>
                        <div class="navbar-right-info">
                            <div class="search-toggler"><i class="flaticon-search-1"></i></div>
                            <div class="side-menu-nav sidemenu-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-4.png" alt=""></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url(); ?>assets/web/assets/images/logo-v2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <!--Social Links-->
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="https://www.linkedin.com/company/greenergysolution/"><span class="fab fa-linkedin-in"></span></a></li>
                        <li><a href="<?php echo FACEBOOKLINK; ?>"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="<?php echo GOOGLEPLUSLINK; ?>"><span class="fab fa-whatsapp"></span></a></li>
                        <li><a href="<?php echo YOUTUBELINK; ?>"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <?php
      } else {

    ?>
      <header class="main-header header-style-one">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <ul class="contact-info">

                            <li><a href="tel:<?php echo PHONE; ?>"><i class="flaticon-phone-call"></i><?php echo PHONE; ?></a></li>
                            <li><a href="mailto:<?php echo EMAIL; ?>"><i class="flaticon-envelope"></i><?php echo EMAIL; ?></a></li>
                            <!--<li><i class="flaticon-location-pointer"></i>Chandigarh, India</li>-->
                        </ul>              
                    </div>
                    <div class="right-column"> 
                        <ul class="social-links">
                           <li><a href="https://www.linkedin.com/company/greenergysolution/"><span class="fab fa-linkedin-in"></span></a></li>
                        <li><a href="<?php echo FACEBOOKLINK; ?>"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=918250998977&text=Hi%20I%20contacted%20you%20through%20your%20website!%20Please%20call%20back%20as%20convenient,%20thanks!"><span class="fab fa-whatsapp"></span></a></li>
                        <li><a href="<?php echo YOUTUBELINK; ?>"><span class="fab fa-youtube"></span></a></li>
                        </ul>
                        <div class="get-quote-btn"><a href="<?php echo base_url('contact'); ?>">Get a Quote</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/logo/'.IMAGE); ?>" alt=""></a></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-3.png" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                       <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                  <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
                                    <li class="dropdown"><a href="#">Products</a>
                                        <ul>
                                            <?php
                                          if(!empty($categoryDetails)){

                                            foreach ($categoryDetails as $categoryList) {
                                              $categoryId= !empty($categoryList->id) ? $categoryList->id :'';
                                            $categoryUrl= !empty($categoryList->link) ? $categoryList->link :'';
                                          ?>
                                            <li class="dropdown"><a href="#"><?php echo !empty($categoryList->name) ? $categoryList->name :''; ?></a>
                                                 <?php 
                                                    $subCategoryDetails = $this->common->subCategoryDetails($categoryId);
                                                      if(!empty($subCategoryDetails) && count($subCategoryDetails) > 0){
                                                   ?>     
                                                <ul>
                                                  <?php 
                                                   
                                                        foreach ($subCategoryDetails as $subCategoryList) {
                                                          $subCategoryUrl= !empty($subCategoryList->link) ? $subCategoryList->link :'';
                                                    $url = base_url('products/'.$categoryUrl.'/'.$subCategoryUrl);
                                                  ?>
                                                    <li><a href="<?php echo $url; ?>"><?php echo !empty($subCategoryList->name) ? $subCategoryList->name :''; ?></a></li>
                                                  <?php
                                                    }
                                                  ?>  
                                                </ul>
                                                <?php 
                                                     
                                                    }
                                                  ?>  
                                            </li>
                                            <?php
                                                }
                                              }
                                            ?>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('projects'); ?>">Projects</a></li>
                                    <li><a href="<?php echo base_url('industries'); ?>" >Industries</a></li>
                                    <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                                    <li><a href="<?php echo base_url('career'); ?>">Career</a></li>
                                    <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="navbar-right-info">
                              <div class="side-menu-nav sidemenu-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-3.png" alt=""></div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url(); ?>assets/web/assets/images/logo.png" alt=""></a></div>
                        </div>
                        <div class="right-column">
                            <!--Nav Box-->
                            <div class="nav-outer">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-3.png" alt=""></div>
    
                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-md navbar-light">
                                </nav>
                            </div>
                            <div class="navbar-right-info">
                                <div class="side-menu-nav sidemenu-nav-toggler"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-bar-3.png" alt=""></div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url(); ?>assets/web/assets/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <!--Social Links-->
        <div class="social-links">
          <ul class="clearfix">
            <li><a href="<?php echo TWITTERLINK; ?>"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="<?php echo FACEBOOKLINK; ?>"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="<?php echo GOOGLEPLUSLINK; ?>"><span class="fab fa-whatsapp"></span></a></li>
                        <li><a href="<?php echo YOUTUBELINK; ?>"><span class="fab fa-youtube"></span></a></li>
          </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <?php
      }
    ?>
    <section class="hidden-sidebar close-sidebar">
        <div class="wrapper-box">
            <div class="content-wrapper">
                <div class="hidden-sidebar-close"><span class="flaticon-close"></span></div>
                <div class="text-widget sidebar-widget">
                    <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/logo/'.IMAGE); ?>" alt=""></a></div>
                    <div class="text">An engineeringsolution company started in the year 2003 as Consolidated Marketing providing sustainable solutions in utility segment.</div>
                </div>
                <div class="new-widget-two widget">
                    <h4 class="widget_title">Latest Blogs</h4>
                    <div class="content-widget">
                      <?php  
                        if(!empty($blogDetails)) {

                            foreach ($blogDetails as  $blogs) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                              $imagePath= !empty($blogs->image) ? $blogs->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                                  $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                }
                              }
                              $url = base_url('blog/'.$blogs->link);
                        ?> 
                        <article class="post">
                            <figure class="post-thumb"><a href="<?php echo $url; ?>"><img src="<?php echo $image; ?>" alt="" width="80px" height="80px"></a></figure>
                            <div class="content">
                                <div class="post-info"><i class="far fa-clock"></i> <?php echo !empty($blogs->date) ? date('M d, Y',strtotime($blogs->date)): '' ?></div>
                                <h5><a href="<?php echo $url; ?>"><?php echo !empty($blogs->title) ? $blogs->title : ''; ?></a></h5>
                            </div>
                        </article>
                        <?php 
                              }
                          }    
                        ?>
                    </div>
                </div>
                <div class="brochure-widget widget">
                    <h4 class="widget_title">Our Materials</h4>
                    <div class="widget-content">           
                   <?php                        
                                      $imagePath8= !empty($contectData[7]->image) ? $contectData[7]->image: '';
                                       $image8 = base_url('uploads/content/'.$imagePath8);
                                ?>                     
                                  <div class="single-brochure"><a href="<?php echo $image8; ?>" target="_blank"><i class="flaticon-pdf-file-format-symbol"></i> <?php echo !empty($contectData[7]->title) ? $contectData[7]->title :'';?></a></div>
                                  <?php
                                    $imagePath9= !empty($contectData[8]->image) ? $contectData[8]->image: '';
                                    $image9 = base_url('uploads/content/'.$imagePath9);
                                ?> 
                                  <div class="single-brochure"><a href="<?php echo $image9; ?>"><i class="flaticon-doc-file-format"></i><?php echo !empty($contectData[8]->title) ? $contectData[8]->title :'';?></a></div>
                    </div>
                </div>
                   <div class="copyright-text">Copyright © <?php echo date('Y'); ?> Greenergy Solution Pvt. Ltd. | Powered By: <a href="https://www.anttech.in/">Anttech</a></div>
            </div>
        </div>
    </section>
  
      

