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
        <?php echo form_open('administrator/room/add-edit/'.$id, array('name' =>'myform','method'=>'post','enctype'=>'multipart/form-data','id'=>'add-page','role'=>'form','class'=>'form-horizontal'))?>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Category<span class="required">*</span></label>
                    <div class="col-md-8">
                      <select name="category" id="category" class="form-control">
                          <option value=''>Select</option>
                          <?php
                  if (!empty($categoryData)) {
                  foreach ($categoryData as $category) {

                  ?>
                          <option value='<?php echo $category->id; ?>'
                                  <?php
                  if (!empty($getData['categoryId'])) {
                  if ($getData['categoryId'] == $category->id) {echo 'selected';}
                  }
                  ?>><?php echo $category->name; ?></option>
                  <?php
                      }
                  }
                  ?>
                      </select>
                      <?php echo form_error('category'); ?>
                    </div>
                  </div>
                  
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Room Title<span class="required">*</span></label>
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
                    <!-- <div class="form-group">
                      <label class="col-lg-2 control-label">Description<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <textarea  placeholder="Enter Description" name="description" class="cleditor" id="description"><?php echo !empty($getData['description']) ? $getData['description'] : ''; ?></textarea>
                        <?php echo form_error('description'); ?>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Price<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Price" name="price" value="<?php echo !empty($getData['price']) ? $getData['price'] : ''; ?>">
                        <?php echo form_error('price'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Discount %<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Discount 50%" name="discount" value="<?php echo !empty($getData['discount']) ? $getData['discount'] : ''; ?>">
                        <?php echo form_error('discount'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Amenities<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Amenities" name="amenities" value="<?php echo !empty($getData['amenities']) ? $getData['amenities'] : ''; ?>">
                        <?php echo form_error('amenities'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Adult QTY<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Adult" name="adult" value="<?php echo !empty($getData['adult']) ? $getData['adult'] : ''; ?>">
                        <?php echo form_error('adult'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Size<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter Size" name="size" value="<?php echo !empty($getData['size']) ? $getData['size'] : ''; ?>">
                        <?php echo form_error('size'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Rating<span class="required">*</span></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control"  placeholder="Enter rating" name="rating" value="<?php echo !empty($getData['rating']) ? $getData['rating'] : ''; ?>">
                        <?php echo form_error('rating'); ?>
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
                          <label class="col-lg-2 control-label"> Image (1280X960 px)</label>
                          <div class="col-lg-5">
                            <input name="file" id="uploadFileu"  type="file" /> 
                          </div>
                          <div class="col-lg-5">
                              <?php
                              if(!empty($getData['image'])){
                                $imageName = base_url('uploads/no-image.png');
                                $imagePath=base_url('uploads/room/thumbnail/'.$getData['image']);
                                if($getData['image']==''){
                                        $imageName = base_url('uploads/no-image.png');
                                }if(file_exists($imagePath)){
                                $imageName=base_url('uploads/room/thumbnail/'.$getData['image']);
                                } else {
                                $imageName=base_url('uploads/room/thumbnail/'.$getData['image']);
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
                        <a href="<?php echo site_url('administrator/room/'); ?>" class="btn btn-default">Back</a>
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
<script type="text/javascript">
$(document).ready(function(){

    $('#category').on("change",function () {

        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "<?php echo base_url('administrator/subcategory/list'); ?>",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                $("#subcategory").html('');
                $("#subcategory").html(response);
            },
        });
    }); 

});

</script>