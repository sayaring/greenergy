<!--====== Page Banner Start ======-->
<?php
 $contentIdListFooter = [1,2,3,4,5];
  $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->

    <!--====== Blog Details Start ======-->

  
     <section class="about-section-five">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6 image-column">
                    <?php
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                          $imagePath= !empty($contectData[1]->image) ? $contectData[1]->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/content/'.$imagePath)) {
                              $image = base_url('uploads/content/'.$imagePath);
                              $imageBig = base_url('uploads/content/'.$imagePath);
                            }
                          }
                    ?>
                    <div class="image"><img src="<?php echo $image; ?>" alt=""></div>
                    <div class="text" style="text-align:justify">
                       <h2><?php echo !empty($contectData[1]->title) ? $contectData[1]->title: ''; ?></h2><br>
                       <?php echo !empty($contectData[1]->description) ? $contectData[1]->description :'';?>
                    </div>
                </div>
                
                
                
                <div class="col-lg-6">
                    <?php
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                          $imagePath= !empty($contectData[2]->image) ? $contectData[2]->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/content/'.$imagePath)) {
                              $image = base_url('uploads/content/'.$imagePath);
                              $imageBig = base_url('uploads/content/'.$imagePath);
                            }
                          }
                    ?>
                    <!--<div class="image"><img src="<?php echo $image; ?>" alt=""></div>-->
                    <div class="text" style="text-align:justify">
                       <h2><?php echo !empty($contectData[2]->title) ? $contectData[2]->title: ''; ?></h2><br>
                       <?php echo !empty($contectData[2]->description) ? $contectData[2]->description :'';?>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </section>
    <!--====== Blog Details Ends ======-->
    
      <!-- 
    <section class="statement-section">
        <div class="auto-container">
            <div class="row no-gutters">
                <div class="col-xl-4 statement-block">
                    <div class="inner-box" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/resource/image-107.jpg);">
                        <div class="icon-outer">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-37.png" alt=""></div>
                        </div>
                        <h4><?php echo !empty($contectData[3]->title) ? $contectData[3]->title: ''; ?></h4>
                        <div class="text"><?php echo !empty($contectData[3]->description) ? $contectData[3]->description :'';?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 statement-block">
                    <div class="inner-box" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/resource/image-108.jpg);">
                        <div class="icon-outer">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-38.png" alt=""></div>
                        </div>
                        <h4><?php echo !empty($contectData[4]->title) ? $contectData[4]->title: ''; ?></h4>
                        <div class="text"><?php echo !empty($contectData[4]->description) ? $contectData[4]->description :'';?> 
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 statement-block">
                    <div class="inner-box" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/resource/image-109.jpg);">
                        <div class="icon-outer">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-39.png" alt=""></div>
                        </div>
                        <h4><?php echo !empty($contectData[5]->title) ? $contectData[5]->title: ''; ?></h4>
                        <div class="text"><?php echo !empty($contectData[5]->description) ? $contectData[5]->description :'';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->