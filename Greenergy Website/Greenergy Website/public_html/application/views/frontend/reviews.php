<section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Reviews</h2>
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
                        <h2 class="title">Reviews</h2>
                       <?php echo !empty($contectData->description) ? $contectData->description : ''; ?>
                    </div>
                </div>
            </div>
            <div class="tab-content event-tab-items wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="tab-pane fade show active" id="courses">
                    <div class="row">
					<?php  
                        if(!empty($reviewLists)) {
                            foreach ($reviewLists as  $review) {
                               $image = base_url('uploads/no-image.png');
                                $imageBig = base_url('uploads/no-image.png');
                              $imagePath= !empty($review->image) ? $review->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                                  $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                }
                              }
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                 <span class="time"><img src="<?php echo $imageBig; ?>" alt="blog"></span><br>
                                <span class="date"><?php echo !empty($review->date) ? date('M d, Y',strtotime($review->date)) : ''; ?></span>
                                <p class="place"><?php echo !empty($review->shortDescription) ? $review->shortDescription: ''; ?></p>
								<p class="place">Language: <?php echo !empty($review->language) ? $review->language: ''; ?></p>
								<p class="place" style="font-weight:bold"> <?php echo !empty($review->name) ? $review->name: ''; ?>, <?php echo !empty($review->place) ? $review->place: ''; ?></p>
								
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

     <?php $this->load->view('frontend/includes/newsletter.php'); ?>

