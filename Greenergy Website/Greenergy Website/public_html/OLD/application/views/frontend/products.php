
<section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>All Products</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">All Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        <!-- Shop section -->
    <section class="shop-section">
        <div class="auto-container">
            <div class="row">
                 <?php  
                     if(!empty($productDetails)) {
                        foreach ($productDetails as  $productList) {
                        $image = base_url('uploads/no-image.png');
                        $imageBig = base_url('uploads/no-image.png');
                        $imagePath= !empty($productList->service_image) ? $productList->service_image: '';
                         $categoryLink= !empty($productList->category_link) ? $productList->category_link: '';
                         $subCategoryLink= !empty($productList->subcategory_link) ? $productList->subcategory_link: '';
                         $productLink= !empty($productList->link) ? $productList->link: '';
                          if(!empty($imagePath)){
                            if (file_exists(FCPATH.'uploads/products/'.$imagePath)) {
                              $image = base_url('uploads/products/thumbnail/'.$imagePath);
                              $imageBig = base_url('uploads/products/'.$imagePath);
                            }
                          }
                      $url = base_url('product/'.$categoryLink.'/'.$subCategoryLink.'/'.$productLink);
                ?>
                <div class="col-lg-4 col-md-6 shop-block">
                    <div class="inner-box">
                        <div class="image"><a href="<?php echo $url; ?>"><img src="<?php echo $image; ?>" alt=""></a></div>
                        <div class="content-upper">
                            <h4><a href="<?php echo $url; ?>"><?php echo !empty($productList->title) ? $productList->title :''; ?></a></h4>
                        </div>
                      </div>
                </div>
                <?php
                    }
                } 
                ?>
                
            </div>
            <!-- <ul class="page_pagination_two center">
                <li class="prev"><a href="#" class="tran3s"><i class="flaticon-arrow-1" aria-hidden="true"></i></a></li>
                <li><a href="#" class="active tran3s">1</a></li>
                <li><a href="#" class="tran3s">2</a></li>
                <li class="next"><a href="#" class="tran3s"><i class="flaticon-arrow-1" aria-hidden="true"></i></a></li>
            </ul> -->
        </div>
    </section>
 

     <?php $this->load->view('frontend/includes/newsletter.php'); ?>

