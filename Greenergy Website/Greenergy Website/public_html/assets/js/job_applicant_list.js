      
    var data = {
                'job_post_id':$('#job_post_id').val()
      
    };

    listJob(data);

  // var jobs = '';
  function listJob(data='') {
    
     jobs = $('#job_applicant_datatable').DataTable({
          "dom": 'Bfl<"topbutton">tip',
              oLanguage: {
                sProcessing: '<div class="dt-loader"></div'
              },
              processing : true,
              serverSide: true,
              destroy: true,
              pageLength: 25,
              order: [[1, "desc"]],
              buttons: [
                    'csv', 'excel'
            ],
      ajax: {
          url: base_url +'administrator/Job/listJobApplicant',
          type: 'POST',
          dataSrc: "data",
          data:data,
      },
      columnDefs: [{responsivePriority: 1 ,targets: 3}],

      columns: [        
          { "width": "50px",  title: "Sr._No.", orderable:false },
          { "width": "50px", title: "Name" },  
          { "width": "150px", title: "mobile" },
          { "width": "100px", title: "CV" },
          { "width": "100px", title: "position" },
          { "width": "100px", title: "qualification" },
          { "width": "100px", title: "stream" },
          { "width": "100px", title: "passoutyear" },
          { "width": "100px", title: "experience" },
           { "width": "100px", title: "status" },
         
      ],
     
    });
     
  }  
