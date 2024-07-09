<?php init_header(); ?> 
  

 <style>._status{cursor: pointer;}</style>

      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="page-title-box">
             <div class="row align-items-center">
                <div class="col-sm-6">
                   <h4 class="page-title"></h4>
                </div>
                <div class="col-sm-6">
             <div class="float-right d-none d-md-block">
                <button type="button" class="btn btn-secondary waves-effect waves-light mb-0" onclick="window.history.back()">Back</button><br><br>
             </div>
            </div>
             </div>
          </div>
		<div class="row">
			<div class="col-12">
				<div class="card">
				   <div class="card-body">
				  
			      	<h4 class="mt-0 header-title m-b-20"><?= $title; ?></h4>
			      	<form class="repeater" enctype="multipart/form-data" method="post" id="" autocomplete="off">
					  <div class="row">
					        
					   	<div class="col-12">
							<div class="row">
			                    <input type="hidden" name="id" id="id" value="<?= (isset($id))? $id : '' ?>">
						      	<div class="form-group col-md-6">
			                        <label>Shop Name</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter shop name" name="shop_name" value="<?= (isset($shop_name))? $shop_name : ''; ?>">
			                        </div>
			                    </div>
   
			                    <div class="form-group col-md-6">
			                        <label>Vendor Name</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter vendor name" name="vendor_name" value="<?= (isset($vendor_name))? $vendor_name : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>Vendor Category</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter Vendor Category" name="vendor_category" value="<?= (isset($vendor_category))? $vendor_category : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>Mobile Number</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter Mobile Number" name="mobile_number" value="<?= (isset($mobile_number))? $mobile_number : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>Phone Number</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter Phone Number" name="phone_number" value="<?= (isset($phone_number))? $phone_number : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>Pan Number</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter pan number" name="pan_number" value="<?= (isset($pan_number))? $pan_number : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>GST Number</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter gst number" name="gst_number"  value="<?= (isset($gst_number))? $gst_number : ''; ?>">
			                        </div>
			                    </div>

			                    <div class="form-group col-md-6">
			                        <label>GST Register Type</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter gst register type" name="gst_register_type" value="<?= (isset($gst_register_type))? $gst_register_type : ''; ?>">
			                        </div>
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label>Fssai Number</label>
			                        <div>
			                        	<input  type="text" class="form-control" required placeholder="Enter fssai number" name="fssai_number" value="<?= (isset($fssai_number))? $fssai_number : ''; ?>">
			                        </div>
			                    </div>

		                       <div class="form-group col-md-6">
				                    <label>Vendor Type</label>
				                      <select class="form-control select2" style="width:100%" name="vendor_type">
			                          <option>Select Vendor Type</option>
			                          <option value="A" <?php  if(($vendor_type)=='A'){ echo 'selected';}?>>A</option>
			                          <option value="B" <?php if(($vendor_type)=='B' ){ echo 'selected';}?>>B</option>
			                          <option value="C" <?php if(($vendor_type)=='C'){ echo 'selected';}?>>C</option>
			                          <option value="D" <?php if(($vendor_type)=='D' ){ echo 'selected';}?>>D</option>
			                         </select>
			                    </div> 

			                

			                    <div class="form-group col-md-6">
			                    <label>Select Zone Name</label>
			                      <select class="form-control select2" style="width:100%" name="zone_id" id="zone_id">
			                          <?php

			                            foreach ($zone_name as $key => $value) {
			                          ?>
			                            <option value="<?= $value['id'] ?>" <?= (isset($beats['zone_id']) && $beats['zone_id'] ==$value['id'])? 'selected': '';?> ><?= $value['zone_name'] ?></option>
			                                <?php
			                                  }
			                                ?>
			                        </select>
			                    </div> 



			                     
			                <div class="form-group col-md-6">
			                    <label>Select Area Name</label>
			                      <select class="form-control select2" style="width:100%" name="beat_id" id="beat_id">
			                          <?php
			                            foreach ($beat_name as $key => $value) {
			                          ?>
			                            <option value="<?= $value['id'] ?>" <?= (isset($beats['beat_id']) && $beats['beat_id'] ==$value['id'])? 'selected': '';?> ><?= $value['beat_name'] ?></option>
			                                <?php
			                                  }
			                                ?>
			                        </select>
			                    </div> 



			                    <div class="form-group col-md-6">
			                    <label>Select Region Name</label>
			                      <select class="form-control select2" style="width:100%" name="region_id" id="region_id">
			                          <?php
			                            foreach ($region_name as $key => $value) {
			                          ?>
			                            <option value="<?= $value['id'] ?>" <?= (isset($beats['region_id']) && $beats['region_id'] ==$value['id'])? 'selected': '';?> ><?= $value['region_name'] ?></option>
			                                <?php
			                                  }
			                                ?>
			                        </select>
			                    </div> 

			                    <div class="form-group col-md-6">
			                        <label>city</label>
			                        <div>
			                        	<input  type="text" class="form-control" placeholder="Enter city" required name="city" value="<?= (isset($city))? $city : ''; ?>">
			                        </div>
			                    </div>

			                     <div class="form-group col-md-6">
			                        <label>Shop Image</label>
			                        <div>
			                        	<input  type="file" class="form-control"  name="shop_image" >
			                        	<?= (isset($shop_image))? '<img src="'.base_url().USER_PROFILE.$shop_image.'" width="80">' :'' ; ?>
						            </div>
			                    </div>

			                     <div class="form-group col-md-6">
			                        <label>Discount on Order</label>
			                        <div>
			                        	<input  type="text" class="form-control" placeholder="Enter discount_on_order" required name="discount_on_order" value="<?= (isset($discount_on_order))? $discount_on_order : ''; ?>">
			                        </div>
			                    </div>


			                     <div class="form-group col-md-6">
			                        <label>address</label>
			                        <div>
			                        	<textarea  type="text" class="form-control" required placeholder="Enter address" name="address" ><?= (isset($address))? $address : ''; ?></textarea>
			                        </div>
			                    </div>

			                    
			                    <div class="form-group col-md-6">
			                        <label>address2</label>
			                        <div>
			                        	<textarea  type="text" class="form-control" required placeholder="Enter address2" required name="address2"><?= (isset($address2))? $address2 : ''; ?></textarea>
			                        </div>
			                    </div>
			                    
			                    

			                    <div class="form-group col-md-6">
			                        <label>GST Registered</label>
			                        <div>
			                        	<input type="radio" required value="1" name="gst_registered" <?= (isset($gst_registered) && $gst_registered== 1)? 'checked': '';?>>
			                        	&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                        	<input type="radio" required value="0" name="gst_registered" <?= (isset($gst_registered) && $gst_registered == 0)? 'checked': '';?>>
			                        	&nbsp;&nbsp;No
						            </div>
			                    </div>

			                   
		         
			                    <div class="form-group col-md-6">
			                        <label>Status</label>
			                        <div>
			                        	<input type="radio" required value="1" name="is_active" <?= (isset($is_active	) && $is_active== 1)? 'checked': '';?>>
			                        	&nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                        	<input type="radio" required value="0" name="is_active" <?= (isset($is_active) && $is_active == 0)? 'checked': '';?>>
			                        	&nbsp;&nbsp;In-Active
						            </div>
			                    </div>
			                </div>
			            </div>
					   	 			
		               
						<div class="col-md-12 mb-4">
					        <input type="submit" class="btn btn-primary float-left" value="Submit">
					   	</div>
					      </form>
				   	  </div>
				   </div>
				</div>
			</div>
		</div>
          <!-- end row -->
       </div>
       <!-- container-fluid -->
    </div>
</div>
    <!-- content -->
<?php init_footer(); ?>     
<script src="<?= base_url(); ?>assets/js/page-js/vendor.js?v=1.0.0"></script>    