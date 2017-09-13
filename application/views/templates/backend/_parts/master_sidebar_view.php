<?php
$seg = $this->uri->segment(2);
?>
<div class="list-group">
  <a href="/admin/dashboard" class="list-group-item <?php echo active('dashboard'); ?>">Dashboard</a>
  <a href="/admin/customers" class="list-group-item <?php echo active('customers'); ?>">Customers</a>
  <a href="/admin/logs" class="list-group-item <?php echo active('logs'); ?>">Logs</a>
</div>
