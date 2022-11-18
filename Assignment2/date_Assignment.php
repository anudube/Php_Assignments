<?php
// enter date
 $date = readline("Enter current date:");
 $add_date = date("y-m-d", strtotime($date." + 10 days"));
    echo "After 10 days date is $add_date".PHP_EOL;
 $last_year = date("y-m-d",strtotime("-1 year", strtotime($date)));
    echo "Last year the date was $last_year";
?>