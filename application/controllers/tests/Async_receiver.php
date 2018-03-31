<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async_receiver extends CI_Controller {
  
  public function __construct()
  {
      parent::__construct();
      $accessToken = $this->input->get_request_header('ASYNC_ACCESS_TOKEN', TRUE);
      $this->load->library('JWT');
      $this->load->config('auth');
      $secret = config_item('CONSUMER_SECRET');
      $this->jwt->decode($accessToken, $secret);
  }

  public function receive()
  {
      _log($this->input->request_headers(), 'headers');
  }
}
