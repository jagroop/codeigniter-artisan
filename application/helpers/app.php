<?php

if (!function_exists('env'))
{
  function env($variable, $default = null) {
    return (defined("ENV::$variable")) ? constant("ENV::$variable") : $default;
  }
}
