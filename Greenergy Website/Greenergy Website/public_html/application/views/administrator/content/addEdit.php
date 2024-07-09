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
        <?php echo form_open('administrator/content/add-edit/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Title<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Title"
                         name="title" value="<?php echo !empty($getData['title']) ? $getData['title'] : ''; ?>" >
                        <?php echo form_error('title'); ?>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Section<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Section" name="section" value="<?php echo !empty($getData['section']) ? $getData['section'] : ''; ?>">
                        <?php echo form_error('section'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Short Description<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Description" name="short_description" value="<?php echo !empty($getData['shortDescription']) ? $getData['shortDescription'] : ''; ?>">
                        <?php echo form_error('short_description'); ?>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Description<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <textarea  placeholder="Enter Description" name="description" class="cleditor" id="description"><?php echo !empty($getData['description']) ? $getData['description'] : ''; ?></textarea>
                        <?php echo form_error('description'); ?>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Meta Title<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Meta Title" name="meta_title" value="<?php echo !empty($getData['metaTitle']) ? $getData['metaTitle'] : ''; ?>">
                        <?php echo form_error('meta_title'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Meta Keywords<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Meta Keywords" name="meta_keywords" value="<?php echo !empty($getData['metaKeywords']) ? $getData['metaKeywords'] : ''; ?>">
                        <?php echo form_error('meta_keywords'); ?>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Meta Description<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Meta Description" name="meta_description" value="<?php echo !empty($getData['metaDescription']) ? $getData['metaDescription'] : ''; ?>">
                        <?php echo form_error('meta_description'); ?>
                      </div>
                    </div> 
                     <div class="form-group">
                          <label class="col-lg-2 control-label"> Image (550 x 410)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['image'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/content/thumbnail/'.$getData['image']);
                                if($getData['image']==''){
                                  $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/content/thumbnail/'.$getData['image']);
                                } else {
                                $imageName=base_url('uploads/content/thumbnail/'.$getData['image']);
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
                        <a href="<?php echo site_url('administrator/content/'); ?>" class="btn btn-default">Back</a>
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