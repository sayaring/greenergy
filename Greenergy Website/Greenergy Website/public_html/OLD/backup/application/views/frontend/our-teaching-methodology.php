<!--====== Page Banner Start ======-->
    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title"><?php echo !empty($contectData->title) ? $contectData->title : ''; ?></h2>
                </div>
            </div>
        </div>
    </section>
   <section class="notice-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-2" style="text-align:justify">
                       <?php echo !empty($contectData->description) ? $contectData->description : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Blog Details Ends ======-->
    
    <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
    <!--====== Newsletter Ends ======-->