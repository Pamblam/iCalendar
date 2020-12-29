<?php

namespace iCalendar\Components;

class StandardTime extends Component{
	protected $name = 'StandardTime';
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