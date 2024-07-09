<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css" integrity="sha512-x2AeaPQ8YOMtmWeicVYULhggwMf73vuodGL7GwzRyrPDjOUSABKU7Rw9c3WNFRua9/BvX/ED1IK3VTSsISF6TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>._status{cursor: pointer;}
   .badge-success{
      background-color: green;
   }
    .badge-success{
      background-color: green;
   }
</style>

 <style>._status{cursor: pointer;}</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
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
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">                    
                    <a href="<?= base_url()."administrator/job/add";?>" class="btn btn-info"><i class="fa fa-plus"></i>Add job</a>

                </div>
            </div>
        </div>
     <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Job List</h3>                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <?php $this->load->view('administrator/job/table_job'); ?>  
             
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url(); ?>assets/js/job.js?v=1.0.0"></script>
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

