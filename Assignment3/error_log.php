<?php
include_once('common.php');
$log_file_name= './my_error_log.log';
error_log("Hi this is my error message \n",3,$log_file_name);
$message ="This is custom Error message";
errorLog("Error",$message,__FILE__,__LINE__,true);

errorLog("SUCCESS","Database is connected",__FILE__,__LINE__,true);

errorLog("INFO","Database table is created",__FILE__,__LINE__,true);

errorLog("WARNING","you have a warning in database query insertion",__FILE__,__LINE__,true);
?>