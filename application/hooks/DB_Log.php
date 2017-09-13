<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_Log 
{

    public function __construct() 
    {
        //
    }

    public function logQueries() 
    {
        $CI =& get_instance();
        $filepath = APPPATH . 'logs/query-log-' . date('Y-m-d') . '.log'; 
        $handle = fopen($filepath, "a+");
        $times = $CI->db->query_times;
        $dayTime = date('D h:i:s');
        foreach ($CI->db->queries as $key => $query) 
        { 
            $query = '<code>' . str_parse($query) . '</code>';
            $sql  = "[SQL] [" . $dayTime . "]" . PHP_EOL . PHP_EOL . $query . PHP_EOL . PHP_EOL;
            $sql .= file_get_contents($filepath);
            file_put_contents($filepath, $sql);  
        }
        fclose($handle);  
    }

}
