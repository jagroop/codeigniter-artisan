<?php $this->load->view('templates/backend/_parts/master_header_view'); ?>
<div id="app">
        <?php $this->load->view('templates/backend/_parts/master_nav_view'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php $this->load->view('templates/backend/_parts/master_sidebar_view'); ?>
                </div>
                <div class="col-md-10">
                   <!-- COntent starts -->
                    <?php echo $the_view_content; ?>
                  <!-- COntent ends -->
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('templates/backend/_parts/master_footer_view'); ?>

