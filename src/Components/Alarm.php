<?php

namespace iCalendar\Components;

class Alarm extends Component{
	protected $name = 'VALARM';
	protected $properties = [
		'ACTION'		=> null,
		'DESCRIPTION'	=> null,
		'TRIGGER'		=> null,
		'SUMMARY'		=> null,
		'ATTENDEE'		=> null,
		'DURATION'		=> null,
		'REPEAT'		=> null,
		'ATTACH'		=> null,
	];
	
}