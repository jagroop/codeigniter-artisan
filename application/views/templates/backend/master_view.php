<?php $this->load->view('templates/backend/_parts/master_header_view'); ?>
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <?php echo $the_view_content; ?>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<?php $this->load->view('templates/backend/_parts/master_footer_view'); ?>

