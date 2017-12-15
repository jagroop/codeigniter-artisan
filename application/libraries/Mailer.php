<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailer {
  /**
   * Email Templates path
   * @var string
   */
  private $templatesPath = FCPATH . "application/views/emails/";
  /**
   * User email Id
   * @var null
   */
  private $toUsers = [];

  /**
   * CC The same Email to other users
   * @var array
   */
  private $ccUsers = [];

  /**
   * BCC The same Email to other users
   * @var array
   */
  private $bccUsers = [];

  /**
   * HTML BODY
   * @var null
   */
  private $htmlBody = null;
  /**
   * Template Name
   * @var null
   */
  private $view = null;
  /**
   * Email Subject
   * @var null
   */
  private $subject = null;
  /**
   * Data to pass on into view
   * @var array
   */
  private $data = array();

  /**
   * Send Email Function
   * @param  string $view Template name
   * @param  array  $data Data to pass into view
   * @return Object       Mail Instance
   */
  public function send($view, $data = []) {
    extract($data);
    $this->view = $view;
    $this->data = $data;
    $file = $this->templatesPath . $this->view . '.php';
    if (file_exists($file)) {
      ob_start();
      require $file;
      $this->htmlBody = ob_get_contents();
      ob_end_clean();
    }
    return $this;
  }
  /**
   * Set to whom EMail will be sent
   * @param  string $to   Email Address
   * @param  string $name Name of the user
   * @return Mail Instance
   */
  public function to($to, $name = "") {
    if(is_array($to))
    {
      foreach ($to as $key => $user) {
        $this->toUsers[$key]['email'] = $user[0];
        $this->toUsers[$key]['name'] = (@$user[1]) ? $user[1] : '';
      }
    } else {
      $this->toUsers[0]['email'] = $to;
      $this->toUsers[0]['name'] = $name;
    }
    return $this;
  }

  /**
   * CC the same email to other users
   * @param  array $users Users
   * @return void        
   */
  public function cc($to, $name = '') {
    if(is_array($to))
    {
      foreach ($to as $key => $user) {
        $this->ccUsers[$key]['email'] = $user[0];
        $this->ccUsers[$key]['name'] = (@$user[1]) ? $user[1] : '';
      }
    } else {
      $this->ccUsers[0]['email'] = $to;
      $this->ccUsers[0]['name'] = $name;
    }
    return $this;
  }

  /**
   * BCC the same email to other users
   * @param  array $users Users
   * @return void        
   */
  public function bcc($to, $name = '') {
    if(is_array($to))
    {
      foreach ($to as $key => $user) {
        $this->bccUsers[$key]['email'] = $user[0];
        $this->bccUsers[$key]['name'] = (@$user[1]) ? $user[1] : '';
      }
    } else {
      $this->bccUsers[0]['email'] = $to;
      $this->bccUsers[0]['name'] = $name;
    }
    return $this;
  }

  /**
   * Set the email subject
   * @param  string $subject Email Subject
   * @return Mail Instance
   */
  public function subject($subject) {
    $this->subject = $subject;
    return $this;
  }
  /**
   * Finaly Deliver the email after setting everything
   * @return boolean || string  Returns true if mail was sent and Error info in case email wasn't sent
   */
  public function deliver() {  
    // dump($this->toUsers);  
    // dump($this->ccUsers);  
    // dd($this->bccUsers);  
    $mail = new PHPMailer;     
    // $mail->SMTPDebug = 1; 
    $mail->isSMTP(); 
    $mail->Host = config_item('mailer_host');
    $mail->Port = config_item('mailer_port');

    $addr = config_item('mailer_from')['address'];
    $addrName = config_item('mailer_from')['name'];

    $mail->SMTPSecure = config_item('mailer_enc');
    $mail->SMTPAuth = true;
    $mail->Username = config_item('mailer_username');
    $mail->Password = config_item('mailer_password');
    $mail->setFrom($addr, $addrName);
    $mail->addReplyTo($addr, $addrName);

    $hasMailsToSendTO = false;

    if(count($this->toUsers) > 0)
    {
      $hasMailsToSendTO = true;
      foreach ($this->toUsers as $key => $toUser) {
        $mail->addAddress($toUser['email'], $toUser['name']);
      }
    }

    if(count($this->ccUsers) > 0)
    {
      foreach ($this->ccUsers as $key => $ccUser) {
        $mail->addCC($ccUser['email'], $ccUser['name']);
      }
    }

    if(count($this->bccUsers) > 0)
    {
      foreach ($this->bccUsers as $key => $bccUser) {
        $mail->addBCC($bccUser['email'], $bccUser['name']);
      }
    }

    if($hasMailsToSendTO)
    {
      $mail->Subject = $this->subject;
      $mail->msgHTML($this->htmlBody);         
      return ($mail->send()) ? true : false;
    }
    
    return false;
  }
}
