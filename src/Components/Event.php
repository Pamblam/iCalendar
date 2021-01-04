<?php

namespace iCalendar\Components;

class Event extends Component{
	protected $name = 'VEVENT';
	protected $properties = [
		'DTSTAMP'		=> null,
		'UID'			=> null,
		'DTSTART'		=> null,
		'CLASS'			=> null,
		'CREATED'		=> null,
		'DESCRIPTION'	=> null,
		'GEO'			=> null,
		'LAST-MOD'		=> null,
		'LOCATION'		=> null,
		'ORGANIZER'		=> null,
		'PRIORITY'		=> null,
		'SEQ'			=> null,
		'STATUS'		=> null,
		'SUMMARY'		=> null,
		'TRANSP'		=> null,
		'URL'			=> null,
		'RECURID'		=> null,
		'RRULE'			=> null,
		'DTEND'			=> null,
		'DURATION'		=> null,
		'ATTACH'		=> null,
		'ATTENDEE'		=> null,
		'CATEGORIES'	=> null,
		'COMMENT'		=> null,
		'CONTACT'		=> null,
		'EXDATE'		=> null,
		'RSTATUS'		=> null,
		'RELATED'		=> null,
		'RESOURCES'		=> null,
		'RDATE'			=> null,
	];
	
	protected $allowed_subcomponents = [
		'VALARM'
	];
}