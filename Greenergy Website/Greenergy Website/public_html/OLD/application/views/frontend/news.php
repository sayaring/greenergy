<section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">News & Events</h2>
                </div>
            </div>
        </div>
</section>
  <section class="event-page">
        <div class="container">
            <div class="row">
                <?php  
                        if(!empty($newsLists)) {
                            foreach ($newsLists as  $news) {
                                $image = base_url('uploads/no-image.png');
                                $imageBig = base_url('uploads/no-image.png');
                              $imagePath= !empty($news->image) ? $news->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                                  $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                }
                              }
                              $url = base_url('news-details/'.$news->link);
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time"><?php echo !empty($news->time) ? $news->time: ''; ?></span>
                                <span class="date"><?php echo !empty($news->time) ? date('M d, Y',strtotime($news->date)) : ''; ?></span>
                                <h4 class="event-title"><a href="<?php echo $url;?>"><?php echo !empty($news->title) ? $news->title: ''; ?></a></h4>
                                <p class="place">Place: <?php echo !empty($news->place) ? $news->place: ''; ?></p>
                                <a href="<?php echo $url;?>" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    <?php 
                        }
                    }
                    ?>
                
                
            </div>
            <!-- <ul class="pagination-items text-center">
                <li><a class="active" href="#">01</a></li>
                <li><a href="#">02</a></li>
                <li><a href="#">03</a></li>
                <li><a href="#">04</a></li>
                <li><a href="#">05</a></li>
            </ul> -->
        </div>
    </section>
     <?php $this->load->view('frontend/includes/newsletter.php'); ?>

