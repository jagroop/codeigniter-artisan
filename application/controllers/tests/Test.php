<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends Rest_Controller {

  public function carbon() {
    $a = carbon()->now();
    dd($a);
  }
}
