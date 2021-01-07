<?php

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');

require "./src/iCalendar.php";

$parser = new iCalendar\IO\Parser("BEGIN:VCALENDAR
METHOD:PUBLISH
VERSION:2.0
X-WR-CALNAME:test
PRODID:-//Apple Inc.//macOS 11.1//EN
X-APPLE-CALENDAR-COLOR:#F64F00
X-WR-TIMEZONE:America/New_York
CALSCALE:GREGORIAN
BEGIN:VTIMEZONE
TZID:America/New_York
BEGIN:DAYLIGHT
TZOFFSETFROM:-0500
RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=2SU
DTSTART:20070311T020000
TZNAME:EDT
TZOFFSETTO:-0400
END:DAYLIGHT
BEGIN:STANDARD
TZOFFSETFROM:-0400
RRULE:FREQ=YEARLY;BYMONTH=11;BYDAY=1SU
DTSTART:20071104T020000
TZNAME:EST
TZOFFSETTO:-0500
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
CREATED:20201228T150314Z
UID:ED294122-AB5B-40BB-961F-3FAA0F4A650A
DTEND;TZID=America/New_York:20201228T120000
TRANSP:OPAQUE
X-APPLE-TRAVEL-ADVISORY-BEHAVIOR:AUTOMATIC
SUMMARY:flubber
LAST-MODIFIED:20201228T150317Z
DTSTAMP:20201228T150332Z
DTSTART;TZID=America/New_York:20201228T110000
SEQUENCE:1
END:VEVENT
BEGIN:VEVENT
CREATED:20201228T150342Z
UID:B1131D06-3712-4B5A-8C58-9FBB2FD42C41
DTEND;TZID=America/New_York:20201207T100000
TRANSP:OPAQUE
X-APPLE-TRAVEL-ADVISORY-BEHAVIOR:AUTOMATIC
SUMMARY:New Event
LAST-MODIFIED:20201228T150342Z
DTSTAMP:20201228T150347Z
DTSTART;TZID=America/New_York:20201207T090000
SEQUENCE:1
END:VEVENT
END:VCALENDAR");

$components = $parser->getComponents();

echo "<pre>"; var_dump($components); exit;

