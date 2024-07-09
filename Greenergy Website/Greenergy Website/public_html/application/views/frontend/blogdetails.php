   <section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Blog Details</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
   <!--====== Page Banner Ends ======-->

    <!--====== Blog Details Start ======-->
 <!-- News Section -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-block-two blog-single-post">
                        <div class="inner-box">
                            <div class="upper-content">
                                <h3>Gas shield Solution Developed for the Aerospace</h3>
                                <ul class="post-meta">
                                    <li><a href="#"><i class="far fa-user"></i>Admin</a></li>
                                    <li><a href="#"><i class="far fa-clock"></i><?php echo !empty($serviceDetails['date']) ? date('M d, Y',strtotime($serviceDetails['date'])) : ''; ?></a></li>
                                    <li><a href="#"><i class="far fa-location"></i><?php echo !empty($serviceDetails['location']) ? $serviceDetails['location'] : ''; ?></a></li>
                                </ul>
                            </div>
                             <?php                                   
                             $image = base_url('uploads/no-image.png');
                              $imagePath= !empty($serviceDetails['image']) ? $serviceDetails['image']: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/blogs/'.$imagePath)) {
                                    $image = base_url('uploads/blogs/'.$imagePath);
                                }
                              }
                              
                            ?> 
                            <div class="image">
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <div class="lower-content">    
                                <h4><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title'] : ''; ?></h4>                            
                                <div class="text mb-40" style="text-align:justify"><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title'] : ''; ?></div>  
                            </div>
                        </div>
     
                        <div class="comment-form">  
                            <div class="group-title"><h3>Submit Your Query</h3></div>
                            <div class="text">Your email address will not be published. Required fields are marked *</div>
                            <div id="statusMessage"></div>
                            <form method="post">
                                <div class="row row-5">
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" id="name" name="username" placeholder="Name*" required="">
                                        <input type="hidden" id="section" name="section"  value="<?php echo !empty($serviceDetails['title']) ? $serviceDetails['title'] : ''; ?>">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="email" id="email" name="email" placeholder="Email*" required="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" id="contact" name="contact" placeholder="Contact No.*" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" id="message" placeholder="Your Comment..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="button" name="submit-form" id="submit"><span class="btn-title"><i class="flaticon-up-arrow"></i>Submit</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    <div class="blog-sidebar">
                        <!-- news widget -->
                        <div class="news-widget widget">
                            <h4 class="widget_title">Latest Post</h4>
                            <div class="news-content">
                                <?php  
                                if(!empty($serviceDetailsMore)) {
                                    foreach ($serviceDetailsMore as  $blogs) {
                                       
                                 $image = base_url('uploads/no-image.png');
                                  $imagePath= !empty($blogs->image) ? $blogs->image: '';
                                  if(!empty($imagePath)){
                                    if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                                      $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                    }
                                  }
                                  $url = base_url('blog/'.$blogs->link);
                            ?>  
                                <h4><a href="<?php echo $url; ?>"><?php echo !empty($blogs->title) ? $blogs->title : ''; ?><i class="flaticon-arrow-1"></i></a></h4>
                            <?php
                                    }
                                 }   
                                ?>    
                                
                            </div>
                        </div>
                       
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!--====== Blog Details Ends ======-->
    
    <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
 