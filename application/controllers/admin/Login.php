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
			$email = $this->input->post('email');
			$password = $this->input->post('password');	
			$admin = $this->db->get_where('admin', ['email' => $email, 'password' => sha1($password)])->row();
			
			if(count($admin) > 0){
				$adminSessionData = array(
				 'admin_id' => $admin->id,
				 'admin_name'=> $admin->name,
				 'email'=> $admin->email,
				 'logged_in' =>TRUE
				 );  				 			                                 
				$this->session->set_userdata($adminSessionData);  
				$admin_id = $this->session->userdata('admin_id');
				$admin_name = $this->session->userdata('admin_name');
				if ($admin_id == 1 ){
					return redirect(base_url() . 'admin/dashboard',$adminSessionData );
				}
				else{
					return redirect(base_url() . 'admin/login' );
				}
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
