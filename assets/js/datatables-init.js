$(document).ready(function(){
  //Server side dataTables initialization.
 $.fn.dtable = function(selector, url){
  var table;
  table = $(selector).DataTable({  
        // "processing": true,
        // "language": {
        //    "processing": "Fetching records..."
        // },
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": url,
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": false,
        },
        ], 
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
   return table;
 };


 //..
});
