 <?php
$contentIdListFooter = [8,7];
$contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
   <section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title']: ''; ?></h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">Project Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
   <!--====== Page Banner Ends ======-->

    <!--====== Blog Details Start ======-->
 <!-- News Section -->
  <div class="service-details-page">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details">
                         <?php                                   
                             $image = base_url('uploads/no-image.png');
                              $imagePath= !empty($serviceDetails['detailsImage']) ? $serviceDetails['detailsImage']: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/products/'.$imagePath)) {
                                    $image = base_url('uploads/products/'.$imagePath);
                                }
                              }
                              
                            ?> 
                        <div class="image"><img src="<?php echo $image; ?>" alt=""></div>
                        <div class="text-block">
                            <h2><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title']: ''; ?></h2>
                            <div class="text">
                                <?php echo !empty($serviceDetails['description']) ? $serviceDetails['description']: ''; ?>
                            </div>
                        </div>
                        <div class="request-callback-area">
                            <h3>Request Call Back</h3>
                            <div class="text">Fill out the below form and our experts will touch with you!</div>
                            <div class="contact-form">
                                <form method="post" action="#" id="contact-form">
                                    <div id="statusMessage"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name*</label>
                                                <input id="name" type="text" name="form_name" value="" placeholder="Your Name*" required>
                                                 <input type="hidden" id="section" name="section"  value="<?php echo !empty($serviceDetails['title']) ? 'Product: '.$serviceDetails['title'] : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="text" name="email" value="" placeholder="Your Email*" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact">Contact</label>
                                                <input id="contact" type="text" name="form_name" value="" placeholder="Contact Number*" required>
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea id="message" name="form_message" placeholder="Enter Your Massage"></textarea>
                                            </div> 
                                            <div class="form-group-two">
                                                <div class="form-btn">
                                                   
                                                    <button class="theme-btn btn-style-one" id="submit" type="button" ><span>Send Now</span></button>
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="service-sidebar">
                        <div class="widget category-widget">
                            <ul>
                                
                                <?php  
                                if(!empty($subCategoryLink)) {
                                    foreach ($subCategoryLink as  $categorySubCategory) {
                                        $categoryUrl= !empty($categorySubCategory->category_link) ? $categorySubCategory->category_link :'';
                                        $subCategoryUrl= !empty($categorySubCategory->subcategory_link) ? $categorySubCategory->subcategory_link :'';
                                  $url = base_url('products/'.$categoryUrl.'/'.$subCategoryUrl);
                                ?>  
                                    <li ><a href="<?php echo $url; ?>"><?php echo !empty($categorySubCategory->subcategory_name) ? $categorySubCategory->subcategory_name : ''; ?></a></li>
                                <?php
                                        }
                                     }   
                                ?>
                            </ul>
                        </div>
                        <div class="brochure-widget widget">
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
                                  <!--<div class="single-brochure"><a href="<?php echo $image9; ?>"><i class="flaticon-doc-file-format"></i><?php echo !empty($contectData[8]->title) ? $contectData[8]->title :'';?></a></div>-->
                            </div>
                        </div>
                        <!--<div class="widget feature-widget feature-block-two">
                            <div class="inner-box">
                                <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-6.png" alt=""></div>
                                <h4>Looking for <br> a job apply now</h4>
                                <div class="text">Join with professional team</div>
                                <div class="link-btn"><a href="#" class="theme-btn style-three"><span>Job Opening</span></a></div>
                            </div>
                        </div>-->
                        
                        
                    </aside> 
                </div>
            </div>
        </div>
    </div>
   

    <!--====== Blog Details Ends ======-->
    
    <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
 