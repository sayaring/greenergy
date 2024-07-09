<link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/assets/themes/default/default.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/assets/css/nivo-slider.css">

    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title"><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title'] : ''; ?></h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner Ends ======-->

    <!--====== Top Course Start ======-->
<section class="courses-details">
        <div class="container">
            <div class="row flex-row-reverse">
          
                <div class="col-lg-8">
                    <div class="courses-details-content mt-50" style="text-align:justify">
                        <?php
                          $enrolUrl = base_url('enrol-now/'.$serviceDetails['link']);
                          $enquireUrl = base_url('enquire-now/'.$serviceDetails['link']);
                        ?>


                        
                        <div class="slider-wrapper theme-default">
                            <div id="slider" class="nivoSlider">
                            <?php
                                //print_r($galleryDetails);
                                if(!empty($galleryDetails)){
                                foreach ($galleryDetails as $gallery) {
                                         
                                 $image = base_url('uploads/no-image.png');
                                  $imagePath= !empty($gallery->image) ? $gallery->image: '';
                                  if(!empty($imagePath)){
                                    if (file_exists(FCPATH.'uploads/courses/'.$imagePath)) {
                                        $image = base_url('uploads/courses/'.$imagePath);
                                        $imageThumbnail = base_url('uploads/courses/thumbnail/'.$imagePath);
                                }
                              }
                              ?>
                            <img src="<?php echo $image; ?>" data-thumb="<?php echo $imageThumbnail; ?>" alt="" /> 
                            <?php 
                                }
                            }
                            ?>
                        </div>
                            <div id="htmlcaption" class="nivo-html-caption"> </div>
                        </div>
                        
                       
                       <?php echo !empty($serviceDetails['description']) ? $serviceDetails['description'] : ''; ?>
                    </div>
                </div>
                            <div class="col-lg-4 ">
                    <div class="courses-sidebar pt-20">
                        <div class="courses-features mt-30">
                            <div class="sidebar-title">
                                <h4 class="title">Course Features</h4>
                            </div>
                            
							<ul class="courses-features-items">
								<li>Levels Taught: <strong><?php echo !empty($serviceDetails['levelsTaught']) ? $serviceDetails['levelsTaught'] : 'N/A'; ?></strong></li>
								<li>Duration: <strong><?php echo !empty($serviceDetails['duration']) ? $serviceDetails['duration'] : 'N/A'; ?></strong>
								&nbsp;</li>
								<li>Exam Preparation(Optional): <strong><?php echo !empty($serviceDetails['examPreparation']) ? $serviceDetails['examPreparation'] : 'N/A'; ?></strong></li>
								<li>Class Duration: <strong><?php echo !empty($serviceDetails['classDuration']) ? $serviceDetails['classDuration'] : 'N/A'; ?></strong></li>
							</ul>
							
                            <div class="sidebar-btn">
                                <a class="main-btn" href="<?php echo $enrolUrl; ?>">Enrol Now</a>
                            </div>
                            <div class="sidebar-btn">
                                <a class="main-btn" href="<?php echo $enquireUrl; ?>">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    </section>

     <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
    <!--====== Newsletter Ends ======-->

 