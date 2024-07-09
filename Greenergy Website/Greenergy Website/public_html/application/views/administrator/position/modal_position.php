<style>
  @media (min-width: 992px){  .modal-lg, .modal-xl { max-width: 1000px;  }  }
  b, strong { font-weight: 600;}
  #_cate_image,#_parent_cate{display: none;}
</style>
<?php
//print_r($product);die;
?>
 <div class="modal-header">
              <h5 class="modal-title mt-0" id="myModalLabel"><?= $sub_title; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           </div>
<!-- Inventory modal content -->
 <form method="post" action="<?= base_url('administrator/Position/add')?>" id="positionsFrm" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-body">
              <input type="hidden" name="id" id="id" value="<?= ($positions)? $positions['id'] : '' ?>">
              <div class="form-group col-md-12">
                <label>Position Name</label>
                <div>
                  <input  type="text" class="form-control" required placeholder=" position name" name="name" value="<?= ($positions)? $positions['name'] : ''; ?>">
                </div>
              </div> 

              <div class="form-group col-md-12">
                <label>Status</label>
                <div>
                  <input type="radio" required value="1" name="is_active" <?= (isset($is_active) && $is_active == 1)? 'checked': '';?> checked>
                    &nbsp;&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" required value="0" name="is_active" <?= (isset($is_active) && $is_active == 0)? 'checked': '';?>>
                    &nbsp;&nbsp;In-Active
                </div>
              </div>

             <div class="modal-footer">
              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
              <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
            </div>
          </form>
  <!-- /.modal -->
<!-- <script src="<//?= base_url(); ?>assets/js/page-js/position.js?v=1.0.0"></script> -->
