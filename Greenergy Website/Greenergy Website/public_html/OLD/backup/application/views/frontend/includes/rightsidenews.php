<div class="col-lg-4">
                    <div class="blog-sidebar right-sidebar pt-20">
                        <div class="blog-sidebar-post mt-30">
                            <div class="sidebar-title">
                                <h4 class="title">Recent News</h4>
                            </div>
                            <ul class="post-items">
                            <?php  
                                if(!empty($serviceDetailsMore)) {
                                    foreach ($serviceDetailsMore as  $blogs) {
                                       
                                 $image = base_url('uploads/no-image.png');
                                  $imagePath= !empty($blogs->image) ? $blogs->image: '';
                                  if(!empty($imagePath)){
                                    if (file_exists(FCPATH.'uploads/blogs/thumbnail/'.$imagePath)) {
                                      $image = base_url('uploads/blogs/thumbnail/'.$imagePath);
                                    }
                                  }
                                  $url = base_url('news/'.$blogs->link);
                            ?>    
                                <li>
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="<?php echo $url; ?>"><img width="71" height="71" src="<?php echo $image; ?>" alt="<?php echo !empty($blogs->title) ? $blogs->title: ''; ?>"></a>
                                        </div>
                                        <div class="post-content">
                                            <h4 class="post-title"><a href="<?php echo $url; ?>"><?php echo !empty($blogs->title) ? $blogs->title: ''; ?></a></h4>
                                            <a href="<?php echo $url; ?>" class="more">Read more <i class="fal fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                    }
                                 }   
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>