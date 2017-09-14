<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 /**
     * Check Authentication
     * Validation
*/
	public function index() {

		if($this->input->method() == "post")
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required',
					array('required' => 'You must provide a %s.')
			);
			if($this->form_validation->run() == FALSE){
				return $this->load->view('admin/login');
			}  
			$data = $this->auth->checkAuth();
			if(count($data) > 0){
				$admin = array(
				 'admin_id' => $data->id,
				 'name'=> $data->name,
				 'logged_in' =>TRUE
				 );  				 			                                 
				$this->session->set_userdata($admin);  
				return redirect(base_url() . 'admin/dashboard');	
			}
		    $this->session->set_flashdata('invalid_credential', 'Invalid email or password');
		    return redirect(base_url() . 'admin/login');    
	    }
	   return $this->load->view('admin/login');
	}
	/**
	* logout..
	*/
	public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
	}
}
