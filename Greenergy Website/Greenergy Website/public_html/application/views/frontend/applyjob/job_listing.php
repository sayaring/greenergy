
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <style>

 .card {
   background: #fff;
   box-shadow: 0 3px 10px rgba(0,0,0,0.1);
   padding-left: 30.5px;
    padding-right: 30.5px;
    margin-bottom: 30px;
}

 .card1{
box-sizing: border-box;
padding-left: 30.5px;
padding-right: 30.5px;
width: 100%;
margin-bottom: 100px;
}
.card1 .i{
   margin-right: 10px;
}
.card1.submenu{
   font-size: 11px;
}
.card1 .card-bottom{
   padding-bottom: 80px;
}
.mb-50{
    margin-bottom: 50px !important;
}

.page-title .content-box .bread-crumb li::after {
    top:0px !important;
}
.pagination{
     margin-bottom: 50px !important;
}
.page-item.active .page-link {
  z-index: 1;
  color: #000;
  background-color: #ee7d16;
  border-color: #ee7d16;
}
.page-link:hover {
  z-index: 2;
  color: #000;
  }
  .page-link {
  
  color: #000;
  }
  .career_title{
                height: 100px !important
            }
   .career_location{
       height: 65px !important;
       font-size: 1.2em;
       line-height: 1.61em;
       font-weight: 400;
   }  
   
   @media only screen and (max-width: 768px) {
        .career_title{
                height: auto !important;
            }
             .career_location{
                   height:  auto !important;
                   font-size: 17px;
                   
               }    
             .career_main_title{
                   position: relative;
                    top: -50px;

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
        <div class="col-md-10">
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
          <div class="row">
              <div class="card1 row" id="careers">             
              </div>
              
               

        </div>
         <nav aria-label="Page navigation mb-50" id="pagination">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
    </div>
</div>

<!--====== Newsletter Start ======-->   
<?php $this->load->view('frontend/includes/newsletter.php'); ?>
