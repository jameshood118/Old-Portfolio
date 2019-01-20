<?php

// Normalize time to count from 0
function timeOfWeek($time) {
date_default_timezone_set('America/New_York');
  if (!is_int($time)) $time = strtotime($time) ;
  $secondsInWeek = (7 * 24 * 3600);
  return (($time - strtotime('monday 00:00')) % $secondsInWeek + $secondsInWeek) % $secondsInWeek;
}

function isOpen($opened, $time) {
  $time = timeOfWeek($time);

  foreach ($opened as $openday) {
    list($open, $close) = $openday;

    if ($open < $close) { 
      if ($time > $open && $time < $close) return true;
    } else {
      if ($time > $open || $time < $close) return true; // Special case sunday -> monday
    }
  }

  return false;
}

$opened = array();
$opened[] = array(timeOfWeek('monday 08:00'), timeOfWeek('monday 17:00'));
$opened[] = array(timeOfWeek('tuesday 08:00'), timeOfWeek('tuesday 17:00'));
$opened[] = array(timeOfWeek('wednesday 08:00'), timeOfWeek('wednesday 17:00'));
$opened[] = array(timeOfWeek('thursday 08:00'), timeOfWeek('thursday 17:00'));
$opened[] = array(timeOfWeek('friday 08:00'), timeOfWeek('friday 17:00'));


$open = isOpen($opened, time());
if ($open == true) {
	echo 'Call Now <span style="font-weight:bold; color:black;">1.877.425.4239</span>';
	} else {
		echo "we aint open";
		}

?>