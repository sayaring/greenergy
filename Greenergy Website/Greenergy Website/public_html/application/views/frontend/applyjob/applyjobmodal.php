<style>
	.form-group{
		margin-bottom: 0rem;
	}
</style>
<form method="post" action="<?= base_url('frontend/Career/add_jobdetails')?>" id="form" enctype="multipart/form-data">
   <div class="modal-body">
      <h4>Add Details</h4>
      <hr>
      
      <input type="hidden" id="postion" name="postion" value="">
      <input type="hidden" id="job_post_id" name="job_post_id" value="">
      <div class="form-group col-md-12">
         <label>Name</label>
         <div>
            <input  type="text" class="form-control" required placeholder="Name" name="name" value="">
         </div>
      </div>
      <div class="form-group col-md-12">
         <label>Mobile Number</label>
         <div>
            <input  type="text" class="form-control" required placeholder="Mobile Number" name="mobile" value="">
         </div>
      </div>
      <div class="form-group col-md-12">
         <label>Qualification</label>
         <div>
            <input  type="text" class="form-control" required placeholder="Qualification" name="qualification" value="">
         </div>
      </div>
      <div class="form-group col-md-12">
         <label>Stream</label>     
          <div>
            <input  type="text" class="form-control" required placeholder="stream" name="stream" value="">
         </div>
      </div>
      
      <div class="form-group col-md-12">
	   <label>Upload Cv</label>
	   <div>
	    <input  type="file" class="form-control" placeholder="Upload Image" name="cv"   value="">
		</div>
        </div> 
      
       <div class="form-group col-md-12">
         <label>Passout Year</label>
         <div>
            <input  type="text" class="form-control" required placeholder=" Passout Year" name="passoutyear" value="">
         </div>
      </div>
      <div class="form-group col-md-12">
         <label>Experience</label>
         <div>
            <input  type="text" class="form-control" required placeholder="Experience" name="experience" value="">
         </div>
      </div>
     
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
      <button type="submit" class="btn btn-success  waves-effect waves-light">Add</button>
   </div>
</form>
<script>
  $(document).ready(function () {

   $('#form').validate({ 
        
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
