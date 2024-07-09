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

    <!--====== Blog Details Start ======-->
<section class="event-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="event-details-content mt-50" style="text-align:justify">
                        <?php                                   
                         $image = base_url('uploads/no-image.png');
                          $imagePath= !empty($serviceDetails['image']) ? $serviceDetails['image']: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/blogs/'.$imagePath)) {
                                $image = base_url('uploads/blogs/'.$imagePath);
                            }
                          }
                          
                        ?>
                        <img src="<?php echo $image; ?>" alt="">
                        <h3 class="title"><?php echo !empty($serviceDetails['title']) ? $serviceDetails['title'] : ''; ?></h3>
                       <?php echo !empty($serviceDetails['description']) ? $serviceDetails['description'] : ''; ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="event-sidebar pt-20">
                        <div class="event-features mt-30">
                            <div class="sidebar-title">
                                <h4 class="title">Event Information</h4>
                            </div>
                            <ul class="event-features-items">
                                <li>Date <strong><?php echo !empty($serviceDetails['date']) ? date('M d, Y',strtotime($serviceDetails['date'])) : ''; ?></strong></li>
                                <li>Time <strong><?php echo !empty($serviceDetails['time']) ? $serviceDetails['time'] : ''; ?></strong></li>
                                <li>Place <strong><?php echo !empty($serviceDetails['place']) ? $serviceDetails['place'] : ''; ?></strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    
    <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
 