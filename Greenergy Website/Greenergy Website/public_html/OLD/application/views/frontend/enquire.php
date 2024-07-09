<?php
 $contentIdListFooter = [16];
  $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
<section class="page-banner">
    <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="title">Enquire Now</h2>
            </div>
        </div>
    </div>
</section>

<!--====== Contact Start ======-->
    
    <section class="contact-area">
        <div class="container">            
            <div class="contact-form">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-title text-center">
                            <h3 class="title">Submit your query here </h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div id="statusMessage"></div>
                        <div class="contact-form-wrapper">
                            <form id="contact-form" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="name" name="name" placeholder="Name *">
                                            <input type="hidden" id="section"  name="form_address" value="<?php echo !empty($collagesTitle) ? $collagesTitle :''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="email" id="email" name="email" placeholder="Email *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="contact" name="phone" placeholder="Phone *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="subject" name="subject" placeholder="Subject *">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <textarea id="message" name="message" placeholder="Write here..."></textarea>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single-form text-center">
                                            <button type="button" id="submit" class="main-btn">Submit now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Contact Ends ======-->
        <!--====== Newsletter Start ======-->   
    <?php $this->load->view('frontend/includes/newsletter.php'); ?>
    <!--====== Newsletter Ends ======-->


