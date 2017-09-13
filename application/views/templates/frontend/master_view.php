<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/frontend/_parts/master_header_view');
?>
<section>
  <?php echo $the_view_content; ?>
</section>
<?php
$this->load->view('templates/frontend/_parts/master_footer_view');
?>