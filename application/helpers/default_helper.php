<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('url')) {
  function url($route = '') {
    return site_url($route);
  }
}

if (!function_exists('css')) {
	function css($file) {
		return site_url() . 'assets/css/' . $file;
	}
}

if (!function_exists('asset')) {
  function asset($file) {
    return site_url() . 'assets/' . $file;
  }
}

if (!function_exists('js')) {
	function js($file) {
		return site_url() . 'assets/js/' . $file;
	}
}


if (!function_exists('dd')) {
	function dd($data, $var_dump = false) {
		echo "<pre>";
		if ($var_dump) {
			var_dump($data);
		} else {
			print_r($data);
		}
		echo "</pre>";
		die;
	}
}

if (!function_exists('msg')) {
	function msg($key) {
		return config_item($key) ?? '';
	}
}

if (!function_exists('dump')) {
	function dump($data, $var_dump = false) {
		echo "<pre>";
		if ($var_dump) {
			var_dump($data);
		} else {
			print_r($data);
		}
		echo "</pre>";
	}
}

if (!function_exists('str_parse')) {
 function str_parse($txt)
 {
    $txt = preg_replace("/[\r\n]+/", "\n", $txt);
    return preg_replace("/\s+/", ' ', $txt);
 }
}

if(!function_exists('_log'))
{
  function _log($data, $logType = "INFO") {
      $file = FCPATH . "application/logs/logs.log";      
      if (count($data) && file_exists($file) && is_writable($file)) {
        $data = (is_array($data) || is_object($data)) ? json_encode($data) : $data;
        $dayTime = date('D h:i');
        $content = "[" . $logType . "] [" . $dayTime . "]" . PHP_EOL . PHP_EOL . $data . PHP_EOL . PHP_EOL;
        file_put_contents($file, $content, FILE_APPEND);
      }
  }
}

if (!function_exists('active')) {
 function active($route)
 {
 	$CI =& get_instance();
    return ($CI->uri->segment(2) == $route) ? 'active' : '';
 }
}

if (!function_exists('uploads_path')) {
  function uploads_path()
  {
    return FCPATH . 'uploads';
  }
}

if (!function_exists('uploads_url')) {
  function uploads_url($fileName = NULL)
  {
    $uploads = base_url() . '/uploads/';
    return ($fileName) ? $uploads . $fileName : $uploads;
  }
}

if (!function_exists('carbon')) {    
  function carbon(...$args) {
    return new Carbon\Carbon(...$args);
  }
}

if (!function_exists('now')) {    
  function now($dateOnly = false) {
    return ($dateOnly) ? carbon()->now()->toDateString() : carbon()->now()->toDateTimeString();
  }
}

if(!function_exists('push'))
{
  function push($stackName)
  {
    putenv("stack_name=$stackName");
    ob_start(); // start output buffering
  }
}

if(!function_exists('endpush'))
{
  function endpush()
  {
    $bufferContent = ob_get_clean();
    $getStackName = getenv('stack_name');
    return putenv("$getStackName=$bufferContent");
  }
}

if(!function_exists('stack'))
{
  function stack($stackName)
  {
    $scripts = getenv($stackName);
    return ($scripts) ? $scripts : '';
  }
}
