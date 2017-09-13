<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Rest_Controller {

	public function register() {
		//Register Method is safe from JWT Verification
	}

	/**
	 * User Login Function
	 *
	 * @return void
	 */
	public function login() {
		$this->validate($this->input->post(), [
			'email' => 'required|valid_email',
			'password' => 'required',
		]);
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->load->model('customer');
		$user = $this->customer->loginAttempt($email, $password);
		if ($user) {
			$user->access_token = $this->generateJwtToken($user->id);
			return $this->success('Logged In,', $user);
		} else {
			return $this->error('Invalid Email Or Password.');
		}
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
