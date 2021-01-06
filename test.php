<?php

require "./src/iCalendar.php";

$ical = new iCalendar\iCalendar();

$recur = new iCalendar\DataTypes\Recur("FREQ=SECONDLY;UNTIL=JAN 3, 2003");

echo "<pre>"; var_dump($recur); exit;

