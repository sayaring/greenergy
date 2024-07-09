      
    var data = {

      
    };

    listJob(data);

  // var jobs = '';
  function listJob(data='') {
    
     jobs = $('#job_datatable').DataTable({
          "dom": 'fl<"topbutton">tip',
              oLanguage: {
                sProcessing: '<div class="dt-loader"></div'
              },
              processing : true,
              serverSide: true,
              destroy: true,
              pageLength: 25,
              order: [[1, "desc"]],
      ajax: {
          url: base_url +'administrator/Job/listjob',
          type: 'POST',
          dataSrc: "data",
          data:data,
      },
      columnDefs: [{responsivePriority: 1 ,targets: 3}],

      columns: [        
          { "width": "50px",  title: "Sr._No.", orderable:false },
          { "width": "50px", title: "Title" },  
          { "width": "150px", title: "Location" },
          { "width": "100px", title: "Position" },
          { "width": "100px", title: "Status" },
          { "width": "100px", title: "No of applicant" },
          { "width": "75px", title: "Action" , orderable:false, "className": "text-right"},
      ],
     
    });
     
  }



   $('#position').select2({
            placeholder: 'Select an position Name',
            ajax: {
                url: base_url+'administrator/Job/listposition',
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                        searchTerm: data.term,
                        
                    };
                },
                processResults: function (response) {
                    return {
                        results:response
                    };
                },
                cache: true
            }
        });

