<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = function() {
  
    try {
      $dotenv = new Dotenv\Dotenv(APPPATH);
      $dotenv->load();
    } catch (Exception $e) {
      //
    }

    function env($variable, $default = null) {
      $value = getenv($variable);
      return ($value) ? $value : $default;
    }

};

$hook['post_controller'] = array(    
	'class' => 'DB_Log',             
	'function' => 'logQueries',     
	'filename' => 'DB_Log.php',    
	'filepath' => 'hooks'         
);
