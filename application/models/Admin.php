<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_model{

    protected $table = "admin";
    
    /**
	 * Admin Login Function
	 * @param  string $email    Email Address
	 * @param  string $password Password
	 * @return object|boolean           
	 */
	public function loginAttempt($email, $password) {
		$user = $this->db->get_where($this->table, ['email' => $email])->row();

		if (count($user) > 0 && password_verify($password, $user->password) === true) {
			return $user;
		}
		return false;
	}

}