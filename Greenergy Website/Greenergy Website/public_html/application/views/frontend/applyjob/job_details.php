
 <style>

.card {
   background: #fff;
   box-shadow: 0 3px 10px rgba(0,0,0,0.1);
   
}

 .card-deck{
box-sizing: border-box;
padding-left: 30.5px;
padding-right: 30.5px;
width: 100%;
margin-bottom: 100px;
}
.i{
   margin-right: 10px;
   font-size: 10px;
}
.submenu{
   font-size: 11px;
}
.card-bottom{
   padding-bottom: 80px;
}
.mb-100{
  margin-bottom: 100px !important;
}
.mb-50{
    margin-bottom: 50px !important;
}
.page-title .content-box .bread-crumb li::after {
    top:0px !important;
}
.modal{
  z-index: 99902;
}
.details_job ul{
  padding-left: 1.5rem !important;
  margin-left: 15px !important;
}
.details_job li{
  list-style: disc;
}
 @media only screen and (max-width: 768px) {
        
             .career_main_title{
                   position: relative;
                    top: -50px;

             }
             .details_job{
                 margin-top:10px !important;
             }
         }
</style>

<?php
   $contentIdListFooter = [8,7,11];
   $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
   ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 collapse show d-md-flex pl-0 min-vh-18" id="sidebar">
           
            <?php $this->load->view('frontend/applyjob/left_side_bar'); ?>
        </div>
        <div class="col-md-10 mb-100">
          <!-- Page Title -->
       <section class="page-title mb-50" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
                <div class="auto-container">
                    <div class="content-box">
                        <div class="content-wrapper">
                            <div class="title career_main_title">
                                <h1>Job Detail</h1>
                            </div>
                            <ul class="bread-crumb style-two">
                                <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                                <li><a href="<?php echo base_url('career'); ?>">Career </a></li>
                                <li><a href="<?php echo base_url('apply-job'); ?>">Apply Job </a></li>
                                <li class="active">Job Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
    <!--====== Page Banner Ends ======-->
       <?php $i=1; if($job_data_details) { foreach($job_data_details as $job) { ?> 
      <div class="mt-3">
         <div class="row">
            <div class="col-md-5">
               <div class="card custom-card">
                  <div class="card-body">
                     <h2 class="card-title1 pl-1 pb-3" style=""><?php echo $job['title'];?></h2>
                     <p class="card-text pl-4" style="font-size: 1.3em;line-height: 1.61em;font-weight: 400;"><i class='fas fa-map-marker-alt i'></i><?= $job['location'] ?></p>
                     <p class="card-text pl-4" style="line-height: 1.61em;font-weight: 400;font-size: 1.2em;"><i class='fas fa-briefcase  i'></i><?= $job['experience_required'] ?></p>
                     <button type="button" data-job_post_id="<?php echo $job['id']; ?>" data-postion="<?php echo $job['title']; ?>" class="btn btn-success ml-4 applyjobModal">Apply Job</button>
                  </div>
               </div>
            </div>
            
            <div class="col-md-7">
               <div class="card custom-card details_job" >
                  <div class="card-body">
               
                     <p class="card-text pl-4 "><h4>Qualifications and Skillsets :</h4>
                      <?php echo $job['qualification_skillset'];?></p>


                     <p class="card-text pl-4 pb-3"><h4>Roles and Responsibilities :</h4>
                     <?php echo $job['role_responsibilities'];?></p>
                    
                     <button type="button" class="btn btn-success ml-4 applyjobModal" data-job_post_id="<?php echo $job['id']; ?>" data-postion="<?php echo $job['title']; ?>">Apply Job</button>
                  </div>
               </div>
            </div>
         </div>
         
      </div>



        </div>
         <?php }}?>
    </div>
</div>
      <div id="applyjobModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
            <div class="modal-content">
            <div id="_banner"></div>
            </div>
            </div>
            </div>
<!--====== Newsletter Start ======-->   
<?php $this->load->view('frontend/includes/newsletter.php'); ?>
