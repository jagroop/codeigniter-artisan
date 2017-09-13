<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends Admin_Controller {

  //Logs path
  var $logsPath = APPPATH . 'logs/';

  // Log file Extension
  var $ext = "log";

  public function __construct() {
    parent::__construct();
  }

  public function index($logName = '') {
    if(trim($logName) != '') {
      $check = $this->logsPath . $logName . '.log';
      if(file_exists($check)) {
        $this->data['log'] = $logName;
        return $this->render('logs/view');
      }
    }

    $this->load->helper('directory');
    $logs = directory_map($this->logsPath, 1);
    $ext = $this->ext;
    $logs = array_map(function($log) use ($ext){
      if(pathinfo($log, PATHINFO_EXTENSION) === $ext)
      {
        return str_replace('.' . $ext, '', $log);
      }
    }, $logs);
    $this->data['logs'] = array_filter($logs);
    return $this->render('logs/index');
  }

  public function read($logName) {
    $file = $this->logsPath . $logName . '.log';
    echo file_get_contents($file, NULL, NULL, 0, 10000);
  }
}
