<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Admin Login
	 *
	 * @return void
	 */
	public function index() {

		if($this->input->method() == "post")
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() == FALSE){
				return $this->load->view('admin/login');
			}  
			
			$this->load->model('admin');
			$admin = $this->admin->loginAttempt($this->input->post('email'), $this->input->post('password'));
			if($admin !== false){
				$adminData = array(
					'name'=> $admin->name,
					'logged_in' => TRUE
				 );  				 			                                 
				$this->session->set_userdata($adminData);  
				return redirect(base_url() . 'admin/dashboard');	
			}
		    $this->session->set_flashdata('invalid_credential', 'Invalid email or password');
		    return redirect(base_url() . 'admin/login');    
	    }
	   return $this->load->view('admin/login');
	}
	
	/**
	 * Admin Logout
	 *
	 * @return void
	 */
	public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
	}
}
