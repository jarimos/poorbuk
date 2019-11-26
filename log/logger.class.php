<?php
  
  class logger {
    
    static $log_file = "log/log.log";
    
//CALL FROM THE OUTSIDE
//logger::log("MY TEXT TO THE LOG FILE");
//THE FILE IS IN log/log.log
    static function log($log) 
	{
      if($log != '') {
        $fh = fopen(self::$log_file, "a");
        fwrite($fh,date('Y-m-d H:i:s')."\n".$log."\n\n");
        fclose($fh);
      }
    }
    
  }
  
