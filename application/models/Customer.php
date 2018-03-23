<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Model {

	var $table = 'customers';
	var $column_order = array(null, 'FirstName', 'LastName', 'phone', 'address', 'city', 'country');
	var $column_search = array('FirstName', 'LastName', 'phone', 'address', 'city', 'country');
	var $order = array('id' => 'asc');

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Generate A Query For DataTables.
	 * @return void 
	 */
	public function query(){
		$this->db->from($this->table);
	}

	/**
	 * Generate total records for DataTables
	 */
	public function total_records(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	/**
	 * Get All Cutomers from Database
	 *
	 * @return array Customers
	 */
	public function all(){
		$list = $this->get_datatables();
		$data = array();
		$i = $this->input->post('start');
		foreach ($list as $customers) {
			$i++;
			$row = array();
			$row[] = $i;
			$row[] = $customers->FirstName;
			$row[] = $customers->LastName;
			$row[] = $customers->phone;
			$row[] = $customers->address;
			$row[] = $customers->city;
			$row[] = $customers->country;
			$data[] = $row;
		}

		return array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->count_all(),
			"recordsFiltered" => $this->count_filtered(),
			"data" => $data,
		);
	}

	/**
	 * User Login Function
	 * @param  string $email    Email Address
	 * @param  string $password Password
	 * @return object | boolean           
	 */
	public function loginAttempt($email, $password) {
		$user = $this->db->get_where($this->table, ['email' => $email])->row();
		if (count($user) > 0 && password_verify($password, $user->password) === true) {
      unset($user->password);
			return $user;
		}
		return false;
	}

}
