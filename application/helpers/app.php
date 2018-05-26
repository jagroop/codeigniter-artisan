<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('env'))
{
  function env($variable, $default = null) {
    return (defined("ENV::$variable")) ? constant("ENV::$variable") : $default;
  }
}
