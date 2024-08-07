
<section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>All Blog</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">All Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
      <!-- News Section -->
    <section class="news-section default-style">
        <div class="auto-container">
            <div class="row">
                <?php  
                    if(!empty($blogDetails)) {
                        foreach ($blogDetails as  $blogs) {
                           
                     $image = base_url('uploads/no-image.png');
                      $imagePath= !empty($blogs->image) ? $blogs->image: '';
                      if(!empty($imagePath)){
                        if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                          $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                        }
                      }
                      $url = base_url('blog/'.$blogs->link);
                ?>
                <div class="col-lg-4 news-block">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?php echo $image; ?>" alt="<?php echo !empty($blogs->title) ? $blogs->title: '' ?>">
                            <div class="overlay-two">
                                <a href="<?php echo $image; ?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-zoom-in"></span></a>
                                <a href="<?php echo $url; ?>"><span class="flaticon-link"></span></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="<?php echo $url; ?>"><?php echo !empty($blogs->title) ? $blogs->title: '' ?></a></h3>
                            <ul class="post-meta">
                                <li><a href="#"><i class="far fa-clock"></i><?php echo !empty($blogs->date) ? date('M d, Y',strtotime($blogs->date)): '' ?></a></li>
                                    <li><a href="#"><i class="far fa-location"></i><?php echo !empty($blogs->location) ? $blogs->location: '' ?></a></li>
                            </ul>
                            <div class="post-share-btn">
                                <div class="social-links-wrapper">
                                    <div class="icon"><span class="flaticon-user"></span>Admin</div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
                <?php
                        }
                     }   
                ?>
           <!--  <ul class="page_pagination_two center">
                <li class="prev"><a href="#" class="tran3s"><i class="flaticon-arrow-1" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active tran3s">1</a></li>
                <li><a href="#" class="tran3s">2</a></li>
                <li class="next"><a href="#" class="tran3s"><i class="flaticon-arrow-1" aria-hidden="true"></i></a></li>
            </ul -->
        </div>
    </section>

     <?php $this->load->view('frontend/includes/newsletter.php'); ?>

