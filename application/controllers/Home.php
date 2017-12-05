<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	public function index(){
		return $this->render('index');
	}
  public function mail_test()
  {
      $this->load->library('mailer');
      $user = new stdClass;
      $this->mailer->send('test', compact('user'))
      ->to('john@gmail.com')
      ->subject('Meeting at 9AM.')
      ->deliver();
  }
}
