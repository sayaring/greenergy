 $('.applyjobModal').on('click', function(e) {
 // $('#applyjobModal').appendTo("body").modal('show');
    applyjobModal();
    console.log( $(this).attr('data-postion'))
     $('#postion').val($(this).attr('data-postion'));
  });
$('body').on('click', '.applyjobModal', function (e) {
        if(e.target.getAttribute('data-postion')) {
            var careerTitle = $(this).attr('data-postion');
            var job_id = $(this).attr('data-job_post_id');
            
            $('#postion').val(careerTitle);
            $('#job_post_id').val(job_id);
        }
});
  function applyjobModal(id='') {
  	 //var BASE_URL = "<?php echo base_url();?>";
    $.ajax({
           url: base_url +'frontend/Career/applyjobModal',
          //url: BASE_URL+'frontend/admin/Carrer/applyjobModal',
          type: 'POST',
          data: {'id':id},
          dataType:'json',
          success: function(res) {
              $('#_banner').html();
            if (res.result == true) {
              $('#_banner').html(res.html);
              $('#applyjobModal').appendTo("body").modal('show');
              var careerTitle = $('.applyjobModal').attr('data-postion');
              var job_id = $('.applyjobModal').attr('data-job_post_id');
            
              $('#postion').val(careerTitle);
              $('#job_post_id').val(job_id);
              // $("#catdrop").select2();
            }else{
              alert_float('error',response.reason);
            }
          }
      })
  }



$(document).ready(function() {
 //$(".product_variant_id").select2();
  $('#_filter').on('change', function() {
    filter();
  });
});
// Detect pagination click
  $('#pagination').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    filter(pageno);
  });

  filter();

  // Load pagination
  function loadPagination(pagno,data=''){
    $.ajax({
      url: base_url+'frontend/Career/getAllLists/'+pagno,
      type: 'post',
      data:data,
      dataType: 'json',
      success: function(response){
        $('#pagination').html(response.pagination);
        if (response.html !== '') {
           //  console.log(response.html);
           $('#careers').html(response.html);  
           
        }else{
          $('#careers').text('No  any Carrer');
        }
        
      }
    });
  }

   function filter(pageno='0') {
        var data = {
                };
      loadPagination(pageno,data);
    } 
