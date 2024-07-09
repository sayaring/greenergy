<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css" integrity="sha512-x2AeaPQ8YOMtmWeicVYULhggwMf73vuodGL7GwzRyrPDjOUSABKU7Rw9c3WNFRua9/BvX/ED1IK3VTSsISF6TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css"/>

 <style>._status{cursor: pointer;}
   .badge-success{
      background-color: green;
   }
    .badge-success{
      background-color: green;
   }
</style>
<link href="<?= base_url() ?>assets/dist/css/tab-page.css" rel="stylesheet">
<style type="text/css">
   .tabs-vertical li .nav-link.active, .tabs-vertical li .nav-link:hover, .tabs-vertical li .nav-link.active:focus {
  background: none !important;
}
</style>
<div class="content-wrapper">
 <section class="content-header">
      <h1><?php echo!empty($pageTitle) ? $pageTitle : ''; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Position</li>
      </ol>
      <?php
        $this->load->view ('includes/notification');
      ?>
   </section>
  <section class="content">
      
     <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">JOB Details</h3>                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <hr>
                  <ul class="nav nav-tabs customtab" role="tablist">
                     <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                     <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Description</span></a> </li>    -->
                       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Role Responsibilities</span></a> </li>                    
                         <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile4" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Qualification Skill Set</span></a> </li>                    
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="home2" role="tabpanel">
                        <div class="p-20">
                      
                           <table class="table mb-0">
                              <tbody>
                                 <tr>
                                    <th width="15%">Job Title</th>
                                    <td><?= $job['title'];; ?></td>
                                 </tr>
                                 <tr>
                                    <th>Postion</th>
                                    <td><?= (isset($job['postion']))? $job['postion'] : '--'; ?></td>
                                 </tr>
                                 <tr>
                                    <th>Location</th>
                                    <td><?= ($job['location'])? $job['location'] : '--'; ?></td>
                                 </tr>
                                 <tr>
                                    <th>Category</th>
                                    <td><?= ($job['title'])? $job['title'] :'--' ;?></td>
                                 </tr>
                               
                                 <tr>
                                    <th>Status</th>
                                    <td>
                                       <?php if ($job['status'] == 1): ?>
                                       <span class="badge badge-success _status" onclick="changeStatus(<?= $job['status'] ?>,0)" id="status_<?= $job['status'] ?>" title="Click for In-Active">Active</span>
                                       <?php else: ?>
                                       <span class="badge badge-danger _status" onclick="changeStatus(<?= $job['status'] ?>,1)" id="status_<?= $job['status'] ?>" title="Click for Active">In-Active</span>
                                       <?php endif ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th>No Of Applicant</th>
                                    <td>
                                       <?= $job['no_of_applicant']; ?>
                                    </td>
                                 </tr>
                                 
                                 
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="tab-pane  p-20" id="profile2" role="tabpanel">
                        <h3> Description</h3>
                        <?= ($job['description'])? $job['description'] :'--' ;?>
                     </div>
                      <div class="tab-pane  p-20" id="profile3" role="tabpanel">
                        <h3> Role Responsibilities</h3>
                        <?= ($job['role_responsibilities'])? $job['role_responsibilities'] :'--' ;?>
                     </div>
                      <div class="tab-pane  p-20" id="profile4" role="tabpanel">
                        <h3> Qualification Skill Set</h3>
                        <?= ($job['qualification_skillset'])? $job['qualification_skillset'] :'--' ;?>
                     </div>
                    
                  </div>
                  
           

              </div><!-- /.box -->
            </div>
        </div>
      </div>
       <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Applicants Lists</h3>  
                                 
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <input type="hidden" id="job_post_id" name="job_post_id" value="<?= $job['id']; ?>">
                                <table id=job_applicant_datatable class="table table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                </table>
             
              </div><!-- /.box -->
            </div>
        </div>
   </section>


</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "administrator/blogs/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script type="text/javascript">var base_url="<?= base_url(); ?>"</script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script src="<?= base_url(); ?>assets/js/job_applicant_list.js?v=1.0.0"></script>
<script>
   // Generate float alert
function alert_float(type, message) {
 
     $.toast({
            heading: '',
            text: message,
            position: 'top-right',
          
            icon: type,
            hideAfter: 6000
            
          });
}
  


/*
  Alert Auto hide
*/
 setInterval(function(){
     $('.alert').fadeOut("slow");
}, 3000);
 
</script>