<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async_sender extends Rest_Controller {

  public function send()
  {      
      $this->load->library('async');

      $url = url('tests/async_receiver/receive');

      $this->async->run($url, [
        'task'     => 'Testing Non Blocking request.',
        'message' => 'Its Working !',
      ]);

      $this->success('DONE');
  }
}
