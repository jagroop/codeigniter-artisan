<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async_receiver extends Async_Controller {
  
  public function __construct()
  {
      parent::__construct();
      if($this->isSecure() == false)
      {
       exit('No direct script access allowed');
      }
  }

  public function receive()
  {
      sleep(5);
      _log($this->input->post(), 'Testing_Async');
  }
}
