<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo css('style.css'); ?>">
</head>
<body>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-3">
      
    </div>

    <div class="col col-lg-6">
    <?php echo $this->session->flashdata('invalid_credential'); ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/login',array('name' => 'login','class' => 'form-horizontal')); ?>
      <fieldset>
        <legend>Login Form</legend>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputEmail" placeholder="Email"  value="<?php echo set_value('email'); ?>" type="text" name="email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputPassword" placeholder="Password"  value="<?php echo set_value('password'); ?>" type="password" name="password"> 
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </fieldset>
    <?php echo form_close(); ?>
    </div>

    <div class="col col-lg-3">
      
    </div>
  </div>
</div>
</body>
</html>