<?php
$seg = $this->uri->segment(2);
?>
<div class="list-group">
  <a href="<?php echo url('admin/dashboard'); ?>" class="list-group-item <?php echo active('dashboard'); ?>">Dashboard</a>
  <a href="<?php echo url('admin/customers'); ?>" class="list-group-item <?php echo active('customers'); ?>">Customers</a>
  <a href="<?php echo url('admin/logs'); ?>" class="list-group-item <?php echo active('logs'); ?>">Logs</a>
</div>
