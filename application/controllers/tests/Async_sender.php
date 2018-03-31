<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async_sender extends Front_Controller {

  public function send()
  {
    
      $this->load->library('async');

      $url = url('tests/async_receiver/receive');

      $this->async->run($url, [
        'name'        => 'Bruce Wayne',
        'super_power' => 'He is Rich',
      ]);

      dd('DONE');
  }
}
