<?php
date_default_timezone_set('US/Eastern');

// these could be envs
define("START_TIME", strtotime("09:00"));
define("END_TIME", strtotime("17:30"));
define("DAYS_CLOSED", ["Saturday", "Sunday"]);

function is_closed () {
    $time = strtotime(date("H:i:s"));
    $day_of_week = date("l");
    if ( in_array($day_of_week, DAYS_CLOSED) ) return true; 
    if(START_TIME > $time || END_TIME < $time) return true;
    return false;
}
