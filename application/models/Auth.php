<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_model{

    public function __construct() {
		parent::__construct();
    }
    
    public function checkAuth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');	
        $admin = $this->db->get_where('admin', ['email' => $email, 'password' => sha1($password)])->row();
        return $admin;
    }

}