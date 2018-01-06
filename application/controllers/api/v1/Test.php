<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends Rest_Controller {
  public function validation_test()
  { 
    $request = $this->input->post();

    $this->validate($request, [
      'foo_id' => 'required|exist,customers:id',
      'name' => 'required|unique,customers:FirstName'
    ]);  

    dd($request);
  }

  public function mail_test()
  {
      $this->load->library('mailer');
      $this->mailer->send('test')
          ->to([['vikal.singh@kindlebit.com', 'Vikal']])
          ->cc([['jagroop.singh@kindlebit.com', 'Jagroop']])
          ->bcc([['sachin.kumar@kindlebit.com', 'Sachin']])
          ->subject('Meeting at 9AM.')
          ->deliver();
  }
}
