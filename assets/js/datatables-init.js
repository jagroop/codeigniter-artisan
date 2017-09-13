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
    });
   return table;
 };

 //..
});
