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
        <?php echo form_open('administrator/generalsetting', array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form'))?>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="name">Site Name</label>
                          <input type="text" class="form-control"  placeholder="Enter Site Name"
                           name="name" value="<?php echo !empty($getData['name']) ? $getData['name'] : ''; ?>" >
                          <?php echo form_error('name'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="email">Site Email</label>
                          <input type="text" class="form-control"  placeholder="Enter Site Email"
                           name="email" value="<?php echo !empty($getData['email']) ? $getData['email'] : ''; ?>" >
                          <?php echo form_error('email'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="phone">Site Phone</label>
                          <input type="text" class="form-control"  placeholder="Enter Site Phone"
                           name="phone" value="<?php echo !empty($getData['phone']) ? $getData['phone'] : ''; ?>" >
                          <?php echo form_error('phone'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="facebookLink">Facebook Link</label>
                          <input type="text" class="form-control"  placeholder="Enter Facebook Link"
                           name="facebookLink" value="<?php echo !empty($getData['facebookLink']) ? $getData['facebookLink'] : ''; ?>" >
                          <?php echo form_error('facebookLink'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="twitterLink">Twitter Link</label>
                          <input type="text" class="form-control"  placeholder="Enter Twitter Link"
                           name="twitterLink" value="<?php echo !empty($getData['twitterLink']) ? $getData['twitterLink'] : ''; ?>" >
                          <?php echo form_error('twitterLink'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="googlePlusLink">Google Plus Link</label>
                          <input type="text" class="form-control"  placeholder="Enter Google Plus Link"
                           name="googlePlusLink" value="<?php echo !empty($getData['googlePlusLink']) ? $getData['googlePlusLink'] : ''; ?>" >
                          <?php echo form_error('googlePlusLink'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="instagramLink">Instagram Link</label>
                          <input type="text" class="form-control"  placeholder="Enter Instagram Link"
                           name="instagramLink" value="<?php echo !empty($getData['instagramLink']) ? $getData['instagramLink'] : ''; ?>" >
                          <?php echo form_error('instagramLink'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="youtubeLink">Youtube</label>
                          <input type="text" class="form-control"  placeholder="Enter Youtube"
                           name="youtubeLink" value="<?php echo !empty($getData['youtubeLink']) ? $getData['youtubeLink'] : ''; ?>" >
                          <?php echo form_error('youtubeLink'); ?>
                        </div>
                      </div> 
                  </div>
                   <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="mapLink">Map Link</label>
                          <input type="text" class="form-control"  placeholder="Enter Map Link"
                           name="mapLink" value="<?php echo !empty($getData['mapLink']) ? $getData['mapLink'] : ''; ?>" >
                          <?php echo form_error('mapLink'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="metaTitle">Meta Title</label>
                          <input type="text" class="form-control"  placeholder="Enter Meta Title"
                           name="metaTitle" value="<?php echo !empty($getData['metaTitle']) ? $getData['metaTitle'] : ''; ?>" >
                          <?php echo form_error('metaTitle'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="metaKeywords">Meta Keywords</label>
                          <input type="text" class="form-control"  placeholder="Enter Meta Keywords"
                           name="metaKeywords" value="<?php echo !empty($getData['metaKeywords']) ? $getData['metaKeywords'] : ''; ?>" >
                          <?php echo form_error('metaKeywords'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                        <div class="form-group">
                          <label for="metaDescription">Meta Description</label>
                          <input type="text" class="form-control"  placeholder="Enter Meta Description"
                           name="metaDescription" value="<?php echo !empty($getData['metaDescription']) ? $getData['metaDescription'] : ''; ?>" >
                          <?php echo form_error('metaDescription'); ?>
                        </div>
                      </div> 
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                          <label class="col-lg-2 control-label"> Logo(300X49)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['image'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/logo/'.$getData['image']);
                                if($getData['image']==''){
                                  $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/logo/'.$getData['image']);
                                } else {
                                $imageName=base_url('uploads/logo/'.$getData['image']);
                                }
                            ?>
                            <img src="<?php echo $imageName; ?>" id="uimg" style="width:80px" />
                            <?php  
                              }
                            ?>
                          </div>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                          <label class="col-lg-2 control-label">favicon (56x56)</label>
                          <div class="col-lg-5">
                            <input name="favicon" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['favicon'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/logo/'.$getData['image']);
                                if($getData['favicon']==''){
                                  $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/logo/'.$getData['favicon']);
                                } else {
                                $imageName=base_url('uploads/logo/'.$getData['favicon']);
                                }
                            ?>
                            <img src="<?php echo $imageName; ?>" id="uimg" style="width:80px" />
                            <?php  
                              }
                            ?>
                          </div>
                    </div> 
                    </div> 
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
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