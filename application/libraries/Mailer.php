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
	private $email = null;
	/**
	 * User name
	 * @var null
	 */
	private $name = null;

  /**
   * CC The same Email to other users
   * @var array
   */
  private $ccUsers = [];
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
	public function send($view, array $data) {
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
		$this->email = $to;
		$this->name = $name;
		return $this;
	}

  /**
   * CC the same email to other users
   * @param  array $users Users
   * @return void        
   */
  public function ccTo($email, $name = '') {
    $this->ccUsers = ['email' => $email, 'name' => $name];
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
		$mail->addAddress($this->email, $this->name);
    if(count($this->ccUsers) > 0)
    {
      $ccEmail = trim($this->ccUsers['email']);
      $ccName = trim($this->ccUsers['name']);
      $mail->addCC($ccEmail, $ccName);
    }
		$mail->Subject = $this->subject;
		$mail->msgHTML($this->htmlBody);         
		return ($mail->send()) ? true : false;
	}
}
