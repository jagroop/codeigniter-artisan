<?php

class Email_test extends Front_Controller {

  public function email_testing()
  {
      $this->load->library('mailer');
      $user = new stdClass;
      $this->mailer->send('test', compact('user')) // emails templates are inside /views/emails/
                    ->to('john@gmail.com')
                    ->subject('Meeting at 9AM.')
                    ->deliver();
  }

}
