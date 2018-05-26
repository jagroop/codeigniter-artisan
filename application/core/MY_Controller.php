<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use ReallySimpleJWT\Token;
use ReallySimpleJWT\TokenBuilder;
use ReallySimpleJWT\TokenValidator;

class Front_Controller extends CI_Controller {

  protected $data = array();

  public function __construct() {
    parent::__construct();
    $this->data['pagetitle'] = config_item('name');
  }

  protected function render($the_view = NULL, $template = 'master') {
    if ($template == 'json' || $this->input->is_ajax_request()) {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    } elseif (is_null($template)) {
      $this->load->view($the_view, $this->data);
    } else {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
      $this->load->view('templates/frontend/' . $template . '_view', $this->data);
    }
  }
}

class Admin_Controller extends CI_Controller {

  protected $data = array();

  public function __construct() {
    parent::__construct();
    if(!$this->session->userdata('logged_in')){
        return redirect(base_url() . 'admin/login');  
        exit;
    }
    $this->data['pagetitle'] = config_item('name');
  }

  protected function render($the_view = NULL, $template = 'master') {
    if (!is_null($the_view)) {
      $the_view = 'admin/' . $the_view;
    }
    if ($template == 'json' || $this->input->is_ajax_request()) {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    } elseif (is_null($template)) {
      $this->load->view($the_view, $this->data);
    } else {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
      $this->load->view('templates/backend/' . $template . '_view', $this->data);
    }
  }
}

class Rest_Controller extends CI_Controller {

  private $authConfig = [];

  protected $auth = NULL;

  public function __construct() {
    parent::__construct();

    $this->config->load('auth');

    $this->authConfig = config_item('jwt');

    header('Content-Type: application/json');
    if ($this->authConfig['enable'] == true && !in_array($this->router->method, $this->authConfig['safe_methods'])) {
      $header = $this->input->get_request_header('Authorization');
      list($jwt) = sscanf($header, 'Bearer %s');
      $auth = $this->verifyJwtToken(trim($jwt));
      if (!$auth || $auth == false) {
        return $this->error('Invalid Access Token.', 403);
        exit;
      }      
      unset($auth->salt);
      $this->auth = $auth;
    }
  }

  public function response(array $response) {
    echo json_encode($response);
    die;
  }

  public function success($msg = "Success", $data = array()) {
    return $this->response(array('code' => 200, 'success' => true, 'msg' => $msg, 'data' => $data));
  }

  public function error($error = "Something went Wrong", $code = 400, $messages = array()) {
    return $this->response(array('code' => $code, 'success' => false, 'error' => $error, 'messages' => $messages));
  }

  public function badRequest($request = "") {
    return $this->response(array('code' => 400, 'success' => false, 'error' => ($request != "") ? $request : 'BAD_REQUEST'));
  }

  public function validate($data, $rules) {
    $this->load->library('validator');
    $validatorInstance = $this->validator->get_instance();
    $is_valid = $validatorInstance::is_valid($data, $rules);
    if ($is_valid !== true) {
      return $this->error($is_valid[0]);
    }
  }

  public function verifyJwtToken($jwtToken) {

    try {
      $isValidToken = Token::validate($jwtToken, $this->authConfig['secret']);
      
      if($isValidToken !== true)
      {
        throw new Exception("Not a valid Access Token", 1);        
      }

      $payload = Token::getPayload($jwtToken);
      $payload = json_decode($payload);
      $haveValidSalt = true;

      if($this->authConfig['invalidate'] === true)
      {
        $counter = $this->db->get_where('customers', ['id' => $payload->id, 'salt' => $payload->salt])->num_rows();
        $haveValidSalt = ($counter > 0) ? true : false;
      }

      return (count($payload) > 0 && $haveValidSalt) ? $payload : false;
    } catch (Exception $e) {
      return false;
    }
  }

  public function generateJwtToken($userPayload) {

    $builder = new TokenBuilder();

    foreach ($userPayload as $key => $value) {
      $builder->addPayload(['key' => $key, 'value' => $value]);
    }

    return $builder->setSecret($this->authConfig['secret'])
                  ->setExpiration($this->authConfig['expire'])
                  ->setIssuer($this->authConfig['issuer'])
                  ->build();
  }
}

class Async_Controller extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  public function isSecure()
  {
      $accessToken = $this->input->get_request_header('ASYNC_ACCESS_TOKEN', TRUE);
      $this->load->library('JWT');
      $this->load->config('auth');
      $secret = config_item('ENC_KEY');
      $key    = config_item('KEY');
      $v = $this->jwt->decode($accessToken, $secret);
      return ($v->jwtKey === $key) ? true : false;
  }

}
