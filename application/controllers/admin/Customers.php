<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('url');
		$this->render('customers/index');
	}

	public function ajax_list() {
		$this->load->model('customer', 'customers');
		$list = $this->customers->all();
		echo json_encode($list);
	}

}
