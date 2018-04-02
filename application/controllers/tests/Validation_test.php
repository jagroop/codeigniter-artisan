<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_test extends Rest_Controller {

  public function validation_testing()
  { 
    $request = $this->input->post();

    $this->validate($request, [
      'foo_id' => 'required|exist,customers:id',
      'name' => 'required|unique,customers:FirstName'
    ]);  

    dd($request);
  }
}
