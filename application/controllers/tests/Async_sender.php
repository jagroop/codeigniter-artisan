<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async_sender extends CI_Controller {

  public function send()
  {      
      $this->load->library('async');

      $url = url('tests/async_receiver/receive');

      $this->async->run($url, [
        'task'     => 'Testing Non Blocking request.',
        'message' => 'Its Working !',
      ]);

      dd('DONE');
  }
}
