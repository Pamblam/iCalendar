<?php

namespace iCalendar\Components;

class DaylightTime extends Component{
	protected $name = 'DaylightTime';
	protected $properties = [
		'DTSTART'			=> null,
		'TZOFFSETTO'		=> null,
		'TZOFFSETFROM'		=> null,
		'RRULE'				=> null,
		'COMMENT'			=> null,
		'RDATE'				=> null,
		'TZNAME'			=> null
	];
}