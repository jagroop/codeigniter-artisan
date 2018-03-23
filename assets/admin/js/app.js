$(document).ready(function() {
    var siteUrl = $('meta[name="site_url"]').attr("content");
    $.fn.dtable("#customersTable", siteUrl+"/admin/customers/ajax_list");
}); 
