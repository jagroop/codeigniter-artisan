<div class="card">
  <div class="card-body">
  <div class="card-title">Customers</div>
    <table id="customersTable" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
     
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>
                </tfoot>
    </table>
  </div>
</div>

<?php push('scripts'); ?>
<script>
$(document).ready(function() {
  $.fn.dtable("#customersTable", '<?php echo url("admin/customers/ajax_list"); ?>');
});
</script>
<?php endpush();?>
