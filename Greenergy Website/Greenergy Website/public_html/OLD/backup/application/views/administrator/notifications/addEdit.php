<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo !empty($pageHeading) ? $pageHeading : ''; ?>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
			<?php
                $this->load->view ('includes/notification');
            ?>
			
			<div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo !empty($pageSection) ? $pageSection : ''; ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
        <?php echo form_open('administrator/notifications/add-edit/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Title<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Title"
                         name="title" value="<?php echo !empty($getData['title']) ? $getData['title'] : ''; ?>" >
                        <?php echo form_error('title'); ?>
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Short Description<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Description" name="short_description" value="<?php echo !empty($getData['shortDescription']) ? $getData['shortDescription'] : ''; ?>">
                        <?php echo form_error('short_description'); ?>
                      </div>
                    </div> 
                    
                    <div class="form-group" >
                      <label class="col-lg-2 control-label">Date<span class="required">*</span></label>
                      <div class="col-lg-3">
                        <div id="datetimepicker1" class="input-append input-group dtpicker">
                            <input data-format="yyyy-MM-dd" readonly type="text" class="form-control" name="date" value="<?php echo !empty($getData['date']) ? $getData['date'] : ''; ?>" >
                            <span class="input-group-addon add-on">
                                <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar"></i>
                            </span>
                        </div>
                      </div>
                    </div>
                   <div class="form-group">
                      <label class="col-lg-2 control-label">Time<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Time" name="time" value="<?php echo !empty($getData['time']) ? $getData['time'] : ''; ?>">
                        <?php echo form_error('time'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Place<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Place" name="place" value="<?php echo !empty($getData['place']) ? $getData['place'] : ''; ?>">
                        <?php echo form_error('place'); ?>
                      </div>
                    </div>
                    
                     
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                        <a href="<?php echo site_url('administrator/notifications/'); ?>" class="btn btn-default">Back</a>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>