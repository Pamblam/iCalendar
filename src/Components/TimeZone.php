<?php

namespace iCalendar\Components;

class TimeZone extends Component{
	protected $name = 'VTIMEZONE';
	protected $properties = [
		'TZID'			=> null,
		'LAST-MOD'		=> null,
		'TZURL'			=> null,
	];
	
	protected $allowed_subcomponents = [
		'StandardTime',
		'DaylightTime'
	];
}