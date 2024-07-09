<?php
 $contentIdListFooter = [6,27,28,29];
  $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
    <!-- Bnner Section -->
    <section class="banner-section style-two">
        <div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                <?php      
                    if(!empty($bannerDetails)) {
                        foreach ($bannerDetails as  $banner) {
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                        $imagePath= !empty($banner->image) ? $banner->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/banner/'.$imagePath)) {
                              $image = base_url('uploads/banner/'.$imagePath);
                              $imageBig = base_url('uploads/banner/'.$imagePath);
                            }
                          }
                      
                ?>
                <!-- Slide Item -->
                <div class="swiper-slide" style="background-image: url(<?php echo $imageBig ?>);">
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <h1><span><?php echo !empty($banner->title) ? $banner->title :''; ?></span></h1>
                                <div class="text"><?php echo !empty($banner->heading_two) ? $banner->heading_two :''; ?></div>
                                <div class="link-box">
                                    <a href="<?php echo base_url('about-us'); ?>" class="theme-btn style-four"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>                
            </div>
        </div>
        <div class="banner-slider-nav">
            <div class="banner-slider-control banner-slider-button-prev"><span><i class="flaticon-arrow-1"></i></span></div>
            <div class="banner-slider-control banner-slider-button-next"><span><i class="flaticon-arrow-1"></i></span> </div>
        </div>
    </section>
    <!-- End Bnner Section -->

    <!-- Services Section Two -->
    <section class="services-section-two">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="sec-title text-center">
                    <div class="sub-title">What we offer
                    </div>
                    <h2>Our Products & Services</h2>
                    <!--<div class="text">We offer sustainable solutions in energy & environment!</div>-->
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                        
                        <?php      
                            if(!empty($homeProductList)) {
                                foreach ($homeProductList as  $productList) {
                                $image = base_url('uploads/no-image.png');
                                $imageBig = base_url('uploads/no-image.png');
                                $imagePath= !empty($productList->service_image) ? $productList->service_image: '';
                                 $categoryLink= !empty($productList->category_link) ? $productList->category_link: '';
                                 $subCategoryLink= !empty($productList->subcategory_link) ? $productList->subcategory_link: '';
                                 $productLink= !empty($productList->link) ? $productList->link: '';
                                  if(!empty($imagePath)){
                                    if (file_exists(FCPATH.'uploads/products/'.$imagePath)) {
                                      $image = base_url('uploads/products/thumbnail/'.$imagePath);
                                      $imageBig = base_url('uploads/products/'.$imagePath);
                                    }
                                  }
                                $url = base_url('product/'.$categoryLink.'/'.$subCategoryLink.'/'.$productLink);
                              
                        ?>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <!--<div class="icon">
                                    <i class="flaticon-machinery-1"></i>
                                    <div class="shape"><img src="<?php echo base_url(); ?>assets/web/assets/images/shape/shape-6.png" alt=""></div>
                                </div>-->
                                <div class="image"><img src="<?php echo $image; ?>" alt=""></div>
                                <div class="lower-content">                            
                                    <h5><?php echo !empty($productList->category_name) ? $productList->category_name :''; ?></h5>
                                    <h4><a href="<?php echo $url; ?>"><?php echo !empty($productList->title) ? $productList->title :''; ?></a></h4>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section style-two">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h2>Sustainable Industrial Solutions!</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="link-btn">
                            <a href="http://greenergysolution.in/contact" class="theme-btn style-five"><span>Get a Quote</span></a>
                            <a href="tel:+91-8250998973" class="theme-btn style-three"><span><i class="flaticon-phone-call"></i> +91-8250998973</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facts section -->
    <section class="facts-section-two" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-3.jpg);">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6">
                    <!--<div class="feature-video">
                        <div class="video-box">
                            <div class="video-btn"><a href="#" class="overlay-link play-now ripple" data-fancybox="gallery" data-caption=""><i class="flaticon-play-button"></i></a></div>
                        </div>
                    </div>-->
                </div>
                <div class="col-lg-6">
                    <div class="wrapper-box" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/resource/image-40.jpg);">
                        <div class="row">
                            <div class="col-md-6 column facts-block-two">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><i class="flaticon-machinery-2"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="30">0</span><span>+</span>
                                        </div>
                                        <div class="text">Projects <br>
                                            Done Successfully</div>
                                        <div class="link"><a href="http://greenergysolution.in/about-us" class="link-btn">Read More <i class="flaticon-right-arrow-3"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 column facts-block-two">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><i class="flaticon-winner-1"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="200">0</span><span>+</span>
                                        </div>
                                        <div class="text">Satisfied<br>
                                            Clients Nationwide</div>
                                        <div class="link"><a href="http://greenergysolution.in/about-us" class="link-btn">Read More<i class="flaticon-right-arrow-3"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- About section two -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                        //   $imagePath= !empty($contectData[6]->image) ? $contectData[6]->image: '';
                        //   if(!empty($imagePath)){
                        //     if (file_exists(FCPATH.'uploads/content/'.$imagePath)) {
                        //       $image = base_url('uploads/content/'.$imagePath);
                        //       $imageBig = base_url('uploads/content/'.$imagePath);
                        //     }
                        //   }
                        
                       
                            if (file_exists(FCPATH.'assets/web/assets/images/home_about.jpg')) {
                              $image = base_url('assets/web/assets/images/home_about.jpg');
                              $imageBig = base_url('assets/web/assets/images/home_about.jpg');
                            }
                    ?>
                    <div class="image"><img src="<?php echo $image; ?>" alt=""></div>
                </div>
                <div class="col-lg-6">
                    <div class="sec-title mb-30">
                        <div class="sub-title">About Company</div>
                        <h2>Leading Industrial Solution <br> Provider <span>Since 2003</span></h2>
                        <div class="text"><?php echo !empty($contectData[6]->description) ? $contectData[6]->description :'';?></div>
                    </div>
                    
                    
                    <!--<div class="icon-box">
                        <div class="icon"><i class="flaticon-low-price"></i></div>
                        <h4>Reduce Your Cost</h4>
                        <div class="text">Find fault with a man who chooses to enjoy. </div>
                        <div class="skills">
                         
                            <div class="skill-item">
                                <div class="skill-bar">
                                    <div class="bar-inner"><div class="bar progress-line" data-width="84">
                                        <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="84">0</span>%</div></div>
                                    </div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="icon-box">
                        <div class="icon"><i class="flaticon-timer"></i></div>
                        <h4>Shorten Delivery Time</h4>
                        <div class="text">Undertakes laborious physical exercise except to obtain. </div>
                        <div class="skills">
                            <div class="skill-item">
                                <div class="skill-bar">
                                    <div class="bar-inner"><div class="bar progress-line" data-width="65">
                                        <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="65">0</span>%</div></div>
                                    </div></div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    
                    
                    <div class="link-btn">
                        <a href="http://greenergysolution.in/about-us" class="theme-btn style-six"><span>Read More</span></a>
                        <a href="http://greenergysolution.in/assets/gspl-profile.pdf" class="theme-btn style-seven" target="_blank"><i class="flaticon-download-1"></i><span>Download Brochure</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Whychoose us section -->
    <section class="whychoose-us-section" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-7.jpg);">
        <div class="auto-container">
            <div class="row m-0 top-content justify-content-between align-items-center">
                <div class="sec-title light">
                    <div class="sub-title">Highlights</div>
                    <h2>Reason for Choosing Us</h2>
                </div>
                <div class="text">We provide superior technical support while simultaneously providing <br>industry leading customer satisfaction.</div>
            </div>
            <div class="wrapper-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-clock-4"></i></div>
                            <h4>On Time</h4>
                            <div class="text">We always try to be on time because it helps us become very productive and effective.</div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Talk To Us<i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-robot-arm-1"></i></div>
                            <h4>Latest Technology</h4>
                            <div class="text">We always try to bring new technology and tools into your organization to increase productivity.</div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Talk To Us <i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-winner-1"></i></div>
                            <h4>Easy & Affordable</h4>
                            <div class="text">Our goal is to provide quality products and solutions to our customers at an affordable price.</div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Talk To Us<i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-engineer-1"></i></div>
                            <h4>Qualified Specialists</h4>
                            <div class="text">We are a team of highly qualified professionals who can provide truly valuable services to our customers.</div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Talk To Us<i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-global-warming"></i></div>
                            <h4>Eco Friendly</h4>
                            <div class="text">Being environmentally friendly not only benefits the environment but can also save you money.</div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Read More <i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-support"></i></div>
                            <h4>24/7  Support</h4>
                            <div class="text">Our support team offers 24/7 most practical solutions for your technical issues, contact us today. </div>
                            <div class="link"><a href="http://greenergysolution.in/contact" class="link-btn">Read More <i class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- 
    <section class="team-section-two pb-0">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Behind Our Success</div>
                <h2>Our Professional Team </h2>
                <div class="text">We have facility to produce advance work various industrial applications based on <br> specially developed technology.</div>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                    
                    <?php      
                        if(!empty($clientLists)) {
                            foreach ($clientLists as  $clientList) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                            $imagePath= !empty($clientList->image) ? $clientList->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/client/'.$imagePath)) {
                                  $image = base_url('uploads/client/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/client/'.$imagePath);
                                }
                              }
                          
                    ?>
                    <div class="col-lg-12 team-block-two">
                        <div class="inner-box">
                            <div class="image"><img src="<?php echo  $image; ?>" alt=""></div>
                            <div class="designation">
                                <?php echo !empty($clientList->designation) ? $clientList->designation: ''; ?>
                                    
                            </div>
                            <div class="overlay">
                                <div>
                                    <h4><?php echo !empty($clientList->name) ? $clientList->name: ''; ?></h4>
                                    <div class="text"><?php echo !empty($clientList->shortDescription) ? $clientList->shortDescription: ''; ?></div>
                                    <ul class="social-icon">
                                        <li><a href="<?php echo !empty($clientList->facebook) ? $clientList->facebook: '#'; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?php echo !empty($clientList->twitter) ? $clientList->twitter: '#'; ?>"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?php echo !empty($clientList->linkedin) ? $clientList->linkedin: '#'; ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section> -->

    <!--  
    <section class="projects-section-two">
        <div class="sec-bg" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-4.jpg);"></div>
        <div class="auto-container">
            <div class="row m-0 top-content justify-content-between">
                <div class="sec-title">
                    <div class="sub-title">Wide Range of Instruments & </div>
                    <h2>Electrical Equipment</h2>
                </div>
                <div class="text">We have facility to produce advance work various industrial applications <br> based on specially developed technology.</div>
            </div>
            <div class="filters">
                <ul class="filter-tabs filter-btns">
                    <li class="filter active" data-role="button" data-filter=".all">All Cases</li>
                    <?php  

                        if(!empty($projectWithGallaryDetails)) {

                            foreach ($projectWithGallaryDetails as  $projectTitle) {
                            // $image = base_url('uploads/no-image.png');
                            // $imageBig = base_url('uploads/no-image.png');
                            //   $imagePath= !empty($projectTitle->image) ? $projectTitle->image: '';
                            //   if(!empty($imagePath)){
                            //     if (file_exists(FCPATH.'uploads/products/thumbnail/'.$imagePath)) {
                            //       $image = base_url('uploads/products/thumbnail/'.$imagePath);
                            //       $imageBig = base_url('uploads/products/thumbnail/'.$imagePath);
                            //     }
                            //   }
                             
                        ?> 
                        <li class="filter" data-role="button" data-filter=".cat-<?php echo !empty($projectTitle->project_id) ? $projectTitle->project_id : ''; ?>"><?php echo !empty($projectTitle->title) ? $projectTitle->title : ''; ?></li>
                    <?php
                        }
                      }  
                    ?>
                  
                </ul>
                <div class="link"><a href="<?php echo base_url('projects'); ?>" class="link-btn">All Projects <i class="flaticon-right-arrow-3"></i></a></div>
            </div>
                
            <div class="sortable-masonry">
                <div class="items-container row">
                    <?php 
                    if(!empty($projectWithGallaryDetails)) {

                            foreach ($projectWithGallaryDetails as  $projectTitle) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                              $imagePath= !empty($projectTitle->gallary_image) ? $projectTitle->gallary_image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/products/thumbnail/'.$imagePath)) {
                                  $image = base_url('uploads/products/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/products/thumbnail/'.$imagePath);
                                }
                              }
                             $url = base_url('project/'.$projectTitle->project_link);
                        ?> 
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-<?php echo !empty($projectTitle->project_id) ? $projectTitle->project_id : ''; ?>">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo  $image; ?>" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># <?php echo !empty($projectTitle->title) ? $projectTitle->title : ''; ?></div>
                                    <h4><?php echo !empty($projectTitle->gallary_title) ? $projectTitle->gallary_title : ''; ?></h4>
                                </div>
                                <div class="link-btn"><a href="<?php echo $url; ?>"><span class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                      }  
                    ?>
                    
                </div>
            </div>
        </div>
    </section>-->

    <!-- Testimonials section Two -->
    <section class="testimonials-section-two style-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Testimonials</div>
                <h2>What Our Clients Say</h2>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "2" }}}'>
                    <?php      
                        if(!empty($getReviewLists)) {
                            foreach ($getReviewLists as  $reviewList) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                            $imagePath= !empty($reviewList->image) ? $reviewList->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/blogs/'.$imagePath)) {
                                  $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/blogs/'.$imagePath);
                                }
                              }
                          
                    ?>

                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text"><?php echo !empty($reviewList->shortDescription) ? $reviewList->shortDescription: ''; ?></div>
                            <!--<div class="image"><div class="image-wrapper"><img src="<?php echo $imageBig; ?>" alt=""></div></div>-->
                            <h4><?php echo !empty($reviewList->name) ? $reviewList->name: ''; ?></h4>
                            <div class="designation"><?php echo !empty($reviewList->place) ? $reviewList->place: ''; ?></div>
                            <div class="border-shape"><div class="quote-icon"><span class="flaticon-right-quote-1"></span></div></div>
                        </div>
                    </div>
                    <?php 
                        }
                     }   
                    ?>
                   
                </div>
            </div>
        </div>
    </section>



    <!-- Contact Form section -->
    <section class="contact-form-section style-two" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-6.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Estimation</div>
                <h2>Request for a Quote</h2>
                <!--<div class="text">When requesting a quote you may call us, email us or use our online form. <br>We look forward to discussing your requirement.</div>-->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="wrapper-box">                        
                        <!--Contact Form-->
                        <div class="contact-form">
                            <form method="post" action="#" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="form_name" value="" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" name="email" value="" placeholder="Your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="service">Service</label>
                                            <select id="service" class="selectpicker" name="form_subject">
                                                <option value="*">Chemical Research</option>
                                                <option value=".category-1">About Company </option>
                                                <option value=".category-3">Leadership Team</option>
                                                <option value=".category-4">Global Networks</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" name="form_message" placeholder="Enter Your Massage"></textarea>
                                        </div> 
                                        <div class="form-group-two">
                                            <div class="form-btn">
                                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                                <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>Send Now</span></button>
                                            </div>
                                        </div>                       
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-block-two style-two">
                        <div class="inner-box">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-43.png" alt=""></div>
                            <h4>Subscribe Our <br> Newsletter</h4>
                            <div class="text">Subscribe us & get updates in inbox</div>
                            <div class="link-btn"><a href="mailto:admin@greenergysolution.net.in" class="theme-btn style-three"><span>Join Us</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="news-section style-two">
        <div class="auto-container">
            <div class="sec-title">
                <div class="sub-title">News & Updates</div>
                <h2>Latest From Our Blog</h2>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
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
                    <div class="col-lg-12 news-block">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo $image; ?>" alt="<?php echo !empty($blogs->title) ? $blogs->title : ''; ?>">
                                <div class="overlay-two">
                                    <a href="<?php echo $imageBig; ?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-zoom-in"></span></a>
                                    <a href="<?php echo $url; ?>"><span class="flaticon-link"></span></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="<?php echo $url; ?>"><?php echo !empty($blogs->title) ? $blogs->title : ''; ?></a></h3>
                              <ul class="post-meta">
                                    <li><a href="#"><i class="far fa-clock"></i><?php echo !empty($blogs->date) ? date('M d, Y',strtotime($blogs->date)): '' ?></a></li>
                                    <li><a href="<?php echo $url; ?>"><i class="far fa-location"></i><?php echo !empty($blogs->location) ? $blogs->location : ''; ?></a></li>
                                </ul>
                                <div class="post-share-btn">
                                    <div class="social-links-wrapper">
                                        <div class="icon"><span class="flaticon-user"></span>Admin</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>-->

   <!-- Client logo section -->
    <section class="clients-logo-section">
        <div class="auto-container">
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "2" }, "600" :{ "items" : "3" }, "768" :{ "items" : "4" } , "992":{ "items" : "5" }, "1200":{ "items" : "5" }}}'>
                
                <?php      
                    if(!empty($clientLogoLists)) {
                        foreach ($clientLogoLists as  $clientList) {
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                        $imagePath= !empty($clientList->image) ? $clientList->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/client/'.$imagePath)) {
                              $image = base_url('uploads/client/thumbnail/'.$imagePath);
                              $imageBig = base_url('uploads/client/'.$imagePath);
                            }
                          }
                      
                ?>
                <div class="single-client-logo">
                    <img src="<?php echo $imageBig; ?>" alt="<?php echo !empty($clientList->name) ? $clientList->name : ''; ?>">
                </div>
                <?php
                    }
                  }  
                ?>
            </div>
        </div>
    </section>

      

