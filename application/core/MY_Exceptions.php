<?php
class MY_Exceptions extends CI_Exceptions {

    public function __construct()
    {
        parent::__construct();
    }

    protected function str_contains($haystack, $needles) {
      foreach ((array) $needles as $needle) {
        if ($needle != '' && strpos($haystack, $needle) !== false) {
          return true;
        }
      }
      return false;
    }

    protected function isApiRequest()
    {
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        return $this->str_contains($url, '/api/v');
    }

    function show_404($page = '', $log_error = TRUE)
    {
        if($this->isApiRequest())
        {
          header('Content-Type: application/json');
          $response = array('code' => 404, 'success' => 0, 'error' => 'Url Not Found', 'messages' => []);
          echo json_encode($response);
          exit;
        }

        echo "Page Not found";
        exit;        
    }
}
