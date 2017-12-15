<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Gump.php';
class Validator extends Gump {

  protected function get_ci_instance() {
    $CI =& get_instance();
    return $CI;
  }

  protected function validate_unique($field, $input, $param = null) {
    if (!isset($input[$field])) {
      return;
    }

    $params = explode(':', $param);    
    $column = (isset($params[1])) ? $params[1] : $field;
    $value = $input[$field];
    $ci = $this->get_ci_instance();
    $check = $ci->db->get_where($params[0], [$column => $value])->num_rows(); 
    if ($check) {
        return array(
          'field' => $field,
          'value' => $input[$field],
          'rule' => __FUNCTION__,
          'param' => $param,
        );
    }

  }

  public function validate_exist($field, $input, $param = NULL)
  {  
    
    if (!isset($input[$field])) {
      return;
    }

    $params = explode(':', $param);    
    $column = (isset($params[1])) ? $params[1] : $field;
    $value = $input[$field];
    $ci = $this->get_ci_instance();
    $check = $ci->db->get_where($params[0], [$column => $value])->num_rows(); 
    if (!$check) {
        return array(
          'field' => $field,
          'value' => $input[$field],
          'rule' => __FUNCTION__,
          'param' => $param,
        );
    } 
  }

}
