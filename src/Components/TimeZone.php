<?php

namespace iCalendar\Components;

class TimeZone extends Component{
	protected $name = 'VTIMEZONE';
	protected $properties = [];
	
	protected $allowed_subcomponents = [
		'STANDARD',
		'DAYLIGHT'
	];
}