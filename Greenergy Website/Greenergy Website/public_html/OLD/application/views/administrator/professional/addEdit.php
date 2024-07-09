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
                    </div>
                    <!-- form start -->
        <?php echo form_open('administrator/professional/add-edit/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Name<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Name"
                         name="name" value="<?php echo !empty($getData['name']) ? $getData['name'] : ''; ?>" >
                        <?php echo form_error('name'); ?>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Designation<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter designation"
                         name="designation" value="<?php echo !empty($getData['designation']) ? $getData['designation'] : ''; ?>" >
                        <?php echo form_error('designation'); ?>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-lg-2 control-label">Short Description<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Short Description"
                         name="shortDescription" value="<?php echo !empty($getData['shortDescription']) ? $getData['shortDescription'] : ''; ?>" >
                        <?php echo form_error('shortDescription'); ?>
                      </div>
                    </div>
                   <div class="form-group">
                      <label class="col-lg-2 control-label">facebook</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Facebook Link"
                         name="facebook" value="<?php echo !empty($getData['facebook']) ? $getData['facebook'] : ''; ?>" >
                        <?php echo form_error('facebook'); ?>
                      </div>
                    </div>
                   <div class="form-group">
                      <label class="col-lg-2 control-label">Twitter</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Twitter Link"
                         name="twitter" value="<?php echo !empty($getData['twitter']) ? $getData['twitter'] : ''; ?>" >
                        <?php echo form_error('twitter'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Linkedin</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Linkedin Link"
                         name="linkedin" value="<?php echo !empty($getData['linkedin']) ? $getData['linkedin'] : ''; ?>" >
                        <?php echo form_error('linkedin'); ?>
                      </div>
                    </div>
                    
                    
                     <div class="form-group">
                          <label class="col-lg-2 control-label"> Image (370 × 370)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['image'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/client/thumbnail/'.$getData['image']);
                                if($getData['image']==''){
                                        $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/client/thumbnail/'.$getData['image']);
                                } else {
                                $imageName=base_url('uploads/client/thumbnail/'.$getData['image']);
                                }
                            ?>
                            <img src="<?php echo $imageName; ?>" id="uimg" style="width:80px" />
                            <?php  
                              }
                            ?>
                          </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                        <a href="<?php echo site_url('administrator/professional/'); ?>" class="btn btn-default">Back</a>
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