<?php

require "./src/iCalendar.php";

$ical = new iCalendar\iCalendar();

$prop = new iCalendar\Parameters\AltRep(new iCalendar\DataTypes\Uri('https://www.google.com'));

echo "<pre>"; var_dump($prop); exit;

