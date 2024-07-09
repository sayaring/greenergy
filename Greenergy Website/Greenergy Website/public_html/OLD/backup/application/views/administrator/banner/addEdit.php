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
        <?php echo form_open('administrator/banner/add-edit/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Heading<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Heading"
                         name="title" value="<?php echo !empty($getData['title']) ? $getData['title'] : ''; ?>" >
                        <?php echo form_error('title'); ?>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Heading Two<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Heading Two" 
                        name="heading_two" value="<?php echo !empty($getData['heading_two']) ? $getData['heading_two'] : ''; ?>">
                        <?php echo form_error('heading_two'); ?>
                      </div>
                    </div>
                   
                    
                    
                     <div class="form-group">
                          <label class="col-lg-2 control-label"> Image (1920 x 780)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['image'])){                               
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath= !empty($getData['image']) ? $getData['image']: '';
                                if(!empty($imagePath)){
                                  if (file_exists(FCPATH.'uploads/banner/thumbnail/'.$imagePath)) {
                                    $imageName = base_url('uploads/banner/thumbnail/'.$imagePath);
                                  }
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
                        <a href="<?php echo site_url('administrator/banner/'); ?>" class="btn btn-default">Back</a>
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