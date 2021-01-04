<?php

namespace iCalendar\Components;

class FreeBusy extends Component{
	protected $name = 'VFREEBUSY';
	protected $properties = [
		'DTSTAMP'		=> null,
		'UID'			=> null,
		'CONTACT'		=> null,
		'DTSTART'		=> null,
		'DTEND'			=> null,
		'ORGANIZER'		=> null,
		'URL'			=> null,
		'ATTENDEE'		=> null,
		'COMMENT'		=> null,
		'FREEBUSY'		=> null,
		'RSTATUS'		=> null
	];
}