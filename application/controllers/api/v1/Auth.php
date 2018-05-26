<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Rest_Controller {

  public function generatePassword()  {
      $password = password_hash('secret', PASSWORD_BCRYPT);
      echo $password;
  }

	public function register() {
		//Register Method is safe from JWT Verification
	}

	/**
	 * User Login Function
	 * @return JSON
	 */
	public function login() {
    
    $this->validate($this->input->post(), [
      'email'    => 'required|valid_email',
      'password' => 'required',
		]);

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->load->model('customer');
		$user = $this->customer->loginAttempt($email, $password);
		if ($user) {
			$token = $this->generateJwtToken($user);
			return $this->success('Logged In', ['token' => $token]);
		} else {
			return $this->error('Invalid Email Or Password.');
		}
	}

  /**
   * User Logout Function
   * @return JSON
   */
  public function logout() {
    $this->load->model('customer');
    $logout = $this->customer->logout($this->auth->id);
    return ($logout) ? $this->success('Logged Out.') : $this->error('Error occurred while logging out.');
  }

	/**
	 * Test if JWT Authentication is passed
	 *
	 * @return void
	 */
	public function testJWTVerif() {
		return $this->success('Verification Passed !!');
	}
}
