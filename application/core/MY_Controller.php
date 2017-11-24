<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
  /**
   * Safe methods from JWT Verification.
   */
  const SAFE_METHODS = ['register', 'login'];

  private $authConfig = [];

  public function __construct() {
    parent::__construct();

    $this->config->load('auth');

    $this->authConfig = [
      'ENABLE_JWT_AUTH' => config_item('ENABLE_JWT_AUTH'),
      'ACCESS_TOKEN_KEY' => config_item('ACCESS_TOKEN_KEY'),
      'USER_ID_KEY' => config_item('USER_ID_KEY'),
      'CONSUMER_KEY' => config_item('CONSUMER_KEY'),
      'CONSUMER_SECRET' => config_item('CONSUMER_SECRET'),
      'CONSUMER_TTL' => config_item('CONSUMER_TTL'),
    ];

    header('Content-Type: application/json');

    if ($this->authConfig['ENABLE_JWT_AUTH'] == true && !in_array($this->router->method, self::SAFE_METHODS)) {
      $accessToken = $this->input->get_request_header($this->authConfig['ACCESS_TOKEN_KEY'], TRUE);
      $uid = $this->input->get_request_header($this->authConfig['USER_ID_KEY'], TRUE);
      if (!$this->verifyJwtToken($accessToken, $uid)) {
        return $this->error('Invalid Access Token.', 403);
        exit;
      }
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

  public function validate($data, $rules, $postOnly = true) {
    if ($postOnly === true && $this->input->method() !== "post") {
      return $this->error('Method Not Allowed.', 403);
    }
    $this->load->library('validator');
    $is_valid = $this->validator->get_instance()::is_valid($data, $rules);
    if ($is_valid !== true) {
      return $this->error($is_valid[0]);
    }
  }

  public function verifyJwtToken($jwtToken, $uid) {

    $this->load->library('JWT');
    try {
      $key = $this->authConfig['CONSUMER_KEY'];
      $secret = $this->authConfig['CONSUMER_SECRET'];
      $v = $this->jwt->decode($jwtToken, $secret);
      return (count($v) > 0 && $v->consumerKey == $key && $uid == $v->user_id) ? true : false;
    } catch (Exception $e) {
      return false;
    }
  }

  public function generateJwtToken($userID) {
    $this->load->library('JWT');
    return $this->jwt->encode(array(
      'consumerKey' => $this->authConfig['CONSUMER_KEY'],
      'user_id' => $userID,
      'issuedAt' => date(DATE_ISO8601, strtotime("now")),
      'ttl' => $this->authConfig['CONSUMER_TTL'],
    ), $this->authConfig['CONSUMER_SECRET']);
  }
}
