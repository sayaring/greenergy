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
        <?php echo form_open('administrator/products/gallery/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Product<span class="required">*</span></label>
                      <div class="col-md-8">
                        <select class="form-control" name="type">
                          <option value="detailsImage">Details Image</option>
                         
                          
                        </select>
                        
                        <?php echo form_error('type'); ?>
                      </div>
                    </div> 
                     <div class="form-group">
                          <label class="col-lg-2 control-label"> Image (770 X 550)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['detailsImage'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/products/thumbnail/'.$getData['detailsImage']);
                                if($getData['detailsImage']==''){
                                        $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/products/'.$getData['detailsImage']);
                                } else {
                                $imageName=base_url('uploads/products/'.$getData['detailsImage']);
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
                        <a href="<?php echo site_url('administrator/products/'); ?>" class="btn btn-default">Back</a>
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