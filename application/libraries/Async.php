<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async
{
    
    var $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
 
    function run($url, $params)
    {
        $post_string = http_build_query($params);
        $parts = parse_url($url);
        $errno = 0;
        $errstr = "";
 
       //Use SSL & port 443 for secure servers
       //Use otherwise for localhost and non-secure servers
       //For secure server
        //$fp = fsockopen('ssl://' . $parts['host'], isset($parts['port']) ? $parts['port'] : 443, $errno, $errstr, 30);
        //
        //For localhost and un-secure server
       $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);

        if(!$fp)
        {          
          return false; // Something Went Wrong;   
        }

        $this->ci->load->library('JWT');
        $this->ci->load->config('auth');

        $token = $this->ci->jwt->encode(array(
          'consumerKey' => config_item('CONSUMER_KEY'),
          'issuedAt'    => date(DATE_ISO8601, strtotime("now")),
          'ttl'         => config_item('CONSUMER_TTL'),
        ), config_item('CONSUMER_SECRET'));

        $out = "POST ".$parts['path']." HTTP/1.1\r\n";
        $out.= "Host: ".$parts['host']."\r\n";
        $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out.= "Content-Length: ".strlen($post_string)."\r\n";
        $out.= "ASYNC_ACCESS_TOKEN: ".$token."\r\n";
        $out.= "Connection: Close\r\n\r\n";
        if (isset($post_string)) $out.= $post_string;
        fwrite($fp, $out);
        fclose($fp);
  }
}
