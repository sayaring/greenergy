 <?php
$contentIdListFooter = [8,7,11];
$contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
   <section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1><?php echo !empty($contectData[11]->title) ? $contectData[11]->title: ''; ?></h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active"><?php echo !empty($contectData[11]->title) ? $contectData[11]->title: ''; ?></li>
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
                        $imageBig = base_url('uploads/no-image.png');
                          $imagePath= !empty($contectData[11]->image) ? $contectData[11]->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/content/'.$imagePath)) {
                              $image = base_url('uploads/content/'.$imagePath);
                              $imageBig = base_url('uploads/content/'.$imagePath);
                            }
                          }
                    ?> 
                        <div class="image"><img src="<?php echo $image; ?>" alt=""></div>
                        <div class="text-block">
                            <h2><?php echo !empty($contectData[11]->title) ? $contectData[11]->title: ''; ?></h2>
                            <div class="text">
                                <?php echo !empty($contectData[11]->description) ? $contectData[11]->description: ''; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="service-sidebar">
                        
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
                                  <div class="single-brochure"><a href="<?php echo $image9; ?>"><i class="flaticon-doc-file-format"></i><?php echo !empty($contectData[8]->title) ? $contectData[8]->title :'';?></a></div>
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
 