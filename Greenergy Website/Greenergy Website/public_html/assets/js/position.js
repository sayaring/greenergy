var rank = '';
  function listPosition(data='') {
    var data = {


          // 'designation':$('#designation').val(),
          // 'police_station':$('#police_station').val(),
        };

      category = $('#position_datatable').DataTable({
          "dom": 'fl<"topbutton">tip',
              oLanguage: {
                sProcessing: '<div class="dt-loader"></div'
              },
              processing : true,
              serverSide: true,
              destroy: true,
              pageLength: 25,
              order: [[0, "desc"]],
              ajax: {
                  url: base_url +'administrator/Position/position_list',
                  type: 'POST',
                  dataSrc: "data",
                  data:data
              },
      columnDefs: [{responsivePriority: 1 ,targets: 2}],

      columns: [        
          { "width": "20%",  title: "Sr.No.", orderable:false },         
          { "width": "40%", title: "Position Name" },  
              { "width": "25%", title: "Status" },  
          { "width": "60px", title: "Action", orderable:false, "className": "text-right" }

            ],
     
    });
     
  }

  $(document).ready(function() {

  listPosition();
  // listRankVideo();

});
  $('.positionModel').on('click', function() {
    positionModel();
  });

  function positionModel(id='') {

    $.ajax({
          url: base_url +'administrator/Position/positionModel',
          type: 'POST',
          data: {'id':id},
          dataType:'json',
          success: function(res) {
              $('#_position').html();
            if (res.result == true) {
              $('#_position').html(res.html);
              $('#positionModel').modal('show');
            }else{
              alert_float('error',response.reason);
            }
          }
      })
  }

function changeis_active(id,is_active='') {
  $.ajax({
    url:base_url+'administrator/Position/changeis_active',
    type:'get',
    data:{'id':id, 'is_active': is_active},
    dataType:'json',
    success: function(response) {
      if (response.result == true) {
        if (is_active == 1) {
        $('#is_active_'+id).removeClass('badge-danger').addClass('badge-success').attr({'onclick':'changeis_active('+id+',0)','title':'In-Active'}).text('Active');
        }else{
        $('#is_active_'+id).removeClass('badge-success').addClass('badge-danger').attr({'onclick':'changeis_active('+id+',1)','title':'Active'}).text('In-Active');
        }
      $('#banner_datatable').DataTable().ajax.reload();
        alert_float('success',response.is_actives);
      }else{
        alert_float('error',response.is_actives);
      }
       //location.reload();
    }
  });
}
$('#something').click(function() {
   
});
