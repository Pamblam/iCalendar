<?php

namespace iCalendar\Components;

class Event extends Component{
	protected $name = 'VEVENT';
	protected $properties = [];
	
	protected $allowed_subcomponents = [
		'VALARM'
	];
}