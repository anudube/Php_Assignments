<?php
 $date = readline("Enter current date:");
 $add_date = date("d-M-Y", strtotime($date." + 10 days"));
 echo "After 10 days date is $add_date".PHP_EOL;
 $last_year = date("d-M-Y",strtotime("-1 year", strtotime($date)));
 echo "Last year the date was $last_year";


?>