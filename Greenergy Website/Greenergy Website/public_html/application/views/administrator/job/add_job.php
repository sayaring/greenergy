
 <style>._status{cursor: pointer;}
   .badge-success{
      background-color: green;
   }
    .badge-success{
      background-color: green;
   }
</style>
<link href="<?= base_url() ?>assets/css/pages/tab-page.css" rel="stylesheet">
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
                 <form action="<?= base_url('administrator/Job/add');?>" class="repeater" enctype="multipart/form-data" method="post" id="" autocomplete="off">
					 <div class="col-md-12 col-sm-12 col-xs-12">
					        
					   	
							<div class="row">
			                    <input type="hidden" name="id" id="id" value="<?= (isset($id))? $id : '' ?>">
						      	<div class="form-group col-md-6">
			                        <label>Title</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter title name" name="title" value="<?= (isset($title))? $title : ''; ?>">
			                        </div>
			                    </div>

			                  
			                    <div class="form-group col-md-6">
			                        <label>Location</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter location" name="location" value="<?= (isset($location))? $location : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-3">
			                        <label>Experience Required</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter Experience Required" name="experience_required" value="<?= (isset($experience_required))? $experience_required : ''; ?>">
			                        </div>
			                    </div>


			                    
			                    <div class="form-group col-md-3">
			                        <label>Status</label>
			                        <div>
			                        	<input type="radio" required value="1" name="status" <?= (isset($status	) && $status== 1)? 'checked': '';?>>
			                        	&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                        	<input type="radio" required value="0" name="status" <?= (isset($status) && $status == 0)? 'checked': '';?>>
			                        	&nbsp;&nbsp;In-Active
						            </div>
			                    </div>
			                   <div class="form-group col-md-6">
			                    <label>Select Position Name</label>
			                      <select class="position form-control select2" style="width:100%" name="position" id="position">
			                          <?php
			                            foreach ($position_name as $key => $value) {
			                          ?>
			                            <option value="<?= $value['id'] ?>" <?= (isset($position) && $position ==$value['id'])? 'selected': '';?> ><?= $value['name'] ?></option>
			                                <?php
			                                  }
			                                ?>
			                        </select>
			                    </div>    
			                 
			                    <div class="form-group col-md-12">
			                        <label><b>Role Responsibilities</b></label>
			                        <div>
			                        	<textarea type="text" class="form-control cleditor" id="role" required placeholder="Enter role responsibilities" name="role_responsibilities"><?= (isset($role_responsibilities))? $role_responsibilities : ''; ?></textarea>
			                        </div>
			                    </div>

			                    <div class="form-group col-md-12">
			                        <label><b>Qualification skillset</b></label>
			                        <div>
			                        	<textarea  type="text" id="qualification" class="form-control cleditor" required placeholder="Enter qualification skillset" name="qualification_skillset"><?= (isset($qualification_skillset))? $qualification_skillset : ''; ?></textarea>
			                        </div>
			                    </div>
			                    
			                </div>
			            	
		               </div>
					 <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                        <input type="submit" class="btn btn-primary float-left" value="Submit">
                        <a href="<?php echo site_url('administrator/blogs/'); ?>" class="btn btn-default">Back</a>
                        </div>
                    </div>	
					       

              </form>
              </div><!-- /.box -->
            </div>
        </div>
   </section>



       <!-- container-fluid -->
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
<script src="<?= base_url(); ?>assets/js/position.js?v=1.0.0"></script>
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

