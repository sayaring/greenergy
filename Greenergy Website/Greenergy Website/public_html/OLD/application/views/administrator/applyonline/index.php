<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <h1><?php echo!empty($pageTitle) ? $pageTitle : ''; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Query List</li>
      </ol>
      <?php
        $this->load->view ('includes/notification');
      ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <!-- <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>administrator/query-list/add-edit/0"><i class="fa fa-plus"></i> Add</a>
                </div> -->
            </div>
        </div>
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Apply Online List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>administrator/bookingclass/" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo !empty($searchText) ? $searchText:''; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>S.No.</th>
                      <th>Candidate Details</th>
                      <th>Address</th>
                      <th>Course/College</th>
                      <th>Post On</th>
                      <th>Actions</th>
                    </tr>
                    <?php

                    if(!empty($records))
                    {
            $i=1;
                        foreach($records as $record)
                        {                         
                          if($record->status=='Active'){
                            $class ="btn-success";
                            $status = 'Inactive';
                          } else {
                            $class ="btn-danger";
                            $status = 'Active';
                          }
                                                 
                    ?>

                    <tr id="<?php echo $record->id; ?>">
                      <td><?php echo $i; ?></td>
                      <td><strong>Name: </strong> <?php echo $record->name; ?><br/>
                        <strong>Email: </strong> <?php echo $record->email; ?><br/>
                        <strong>Phone: </strong> <?php echo $record->phone; ?>
                      </td>
                      <td><strong>Residential Address </strong> <?php echo $record->address; ?><br/>
                        
                      </td>
                      <td><strong>Preferred Course Name *: </strong> <?php echo $record->course; ?><br/>
                        <strong>Preferred mode of class: </strong> <?php echo $record->preferredClass; ?><br/>
                      </td>
                      
                      <td>
                        <strong>Post On: </strong> <?php echo $record->createdAt; ?>
                    </td>

                      
                      <td >
                        <a class="btn btn-sm <?php echo $class; ?>" data-toggle="confirmation" rel="tooltip" title="Click to make <?php echo $status; ?>." href="<?php echo base_url().'administrator/applyonline/status-change/'.$record->id.'/'.$status; ?>"><?php echo $record->status; ?></a>
                          
                          <a class="btn btn-sm btn-danger" href="<?php echo base_url().'administrator/applyonline/delete-data/'.$record->id; ?>" data-toggle="confirmation" 
                            rel="tooltip" title="Are you sure to delete?" data-userid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
          $i++;
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "administrator/bookingclass/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
