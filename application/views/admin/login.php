<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset('admin/css/lib/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo asset('admin/css/helper.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('admin/css/style.css'); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
<?php if($error = $this->session->flashdata('invalid_credential')):?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo $error; ?></strong>
    </div>
    <?php endif;?>
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                <?php echo form_open('admin/login',array('name' => 'login','class' => 'form-horizontal')); ?>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input class="form-control" id="inputEmail" placeholder="Email"  value="<?php echo set_value('email'); ?>" type="text" name="email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" id="inputPassword" placeholder="Password"  value="<?php echo set_value('password'); ?>" type="password" name="password"> 
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <!-- <div class="checkbox">
                                        <label>
                                          <input type="checkbox"> Remember Me
                                        </label>
                                         <label class="pull-right">
                                          <a href="#">Forgotten Password?</a>
                                        </label>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    <!-- <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                    </div> -->
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
<!-- All Jquery -->
<script src="<?php echo asset('admin/js/lib/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo asset('admin/js/lib/bootstrap/js/popper.min.js'); ?>"></script>
<script src="<?php echo asset('admin/js/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo asset('admin/js/jquery.slimscroll.js'); ?>"></script>
<!--Menu sidebar -->
<script src="<?php echo asset('admin/js/sidebarmenu.js'); ?>"></script>
<!--stickey kit -->
<script src="<?php echo asset('admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo asset('admin/js/custom.min.js'); ?>"></script>

</body>

</html>
