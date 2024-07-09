<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- <div class="col-lg-3 col-xs-6">             
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo !empty($totalService) ? $totalService: '0'; ?></h3>
                  <p>Collage</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url(); ?>administrator/college" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
            <div class="col-lg-3 col-xs-6">             
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo !empty($totalCourses) ? $totalCourses: '0'; ?></h3>
                  <p>Product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url(); ?>administrator/courses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">             
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo !empty($totalBlogs) ? $totalBlogs: '0'; ?></h3>
                  <p>Blogs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url(); ?>administrator/blogs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- <div class="col-lg-3 col-xs-6">             
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo !empty($totalBooking) ? $totalBooking: '0'; ?></h3>
                  <p>Apply Online</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url(); ?>administrator/applyonline" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo !empty($totalQuery) ? $totalQuery: '0'; ?></h3>
                  <p>Query Lists</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>administrator/query-list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!-- ./col -->
          </div>
    </section>
</div>