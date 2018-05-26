<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('url');
		$this->render('users/index');
	}

	public function ajax_list() {
		$this->load->model('UserModel', 'user');
		$list = $this->user->all();
		echo json_encode($list);
	}

}
