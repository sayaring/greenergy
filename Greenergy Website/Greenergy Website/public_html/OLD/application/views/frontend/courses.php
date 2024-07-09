<?php
 $contentIdListFooter = [26];
  $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>

    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Our Courses</h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner Ends ======-->

    <!--====== Top Course Start ======-->

    <section class="top-courses-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mt-40">
                        <h2 class="title">All Courses</h2>
                        <?php echo !empty($contectData[26]->description) ? $contectData[26]->description :'';?>
                    </div>
                </div>
            </div>
			
			
            <div class="courses-wrapper">
                <div class="row">
                      	  <?php  
                        if(!empty($courseList)) {

                            foreach ($courseList as  $courses) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                          $imagePath= !empty($courses->image) ? $courses->image: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/courses/thumbnail/'.$imagePath)) {
                              $image = base_url('uploads/courses/thumbnail/'.$imagePath);
                              $imageBig = base_url('uploads/courses/thumbnail/'.$imagePath);
                            }
                          }
                          $url = base_url('course/'.$courses->link);
                    ?>
                          <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="<?php echo $url; ?>"><img src="<?php echo $image; ?>" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <h4 class="courses-title" style="text-align:center"><a href="<?php echo $url; ?>"><?php echo !empty($courses->title) ? $courses->title: ''; ?></a></h4>
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
    </section>

     <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
    <!--====== Newsletter Ends ======-->

 