<?php
define("SUCCESS",1);
Define("ERROR",0);
Define("WARNING",2);
define("INFO",3);
$log_file_name= "./custom_error_log.log";
function errorLog($message_type, $message, $file ='', $line='', $echo =false){
    if($message_type =='SUCCESS' || $message_type== 'INFO'){
        //error
        $message = $message_type . ":" .$message;
    }else{
        $message= $message_type .":" . $message . ' ,File: ' .$file . " , Line :" . $line;
    }
    if($echo){
        echo "\n " . $message. "\n";
    }
    error_log("[" . date("Y-m-d H:i:s"). "] $message \n", 3, $GLOBALS['log_file_name']);
}

?>