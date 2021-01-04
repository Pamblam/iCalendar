<?php

namespace iCalendar\Components;

class ToDo extends Component{
	protected $name = 'VTODO';
	protected $properties = [
		'DTSTAMP'		=> null,
		'UID'			=> null,
		'CLASS'			=> null,
		'COMPLETED'		=> null,
		'CREATED'		=> null,
		'DESCRIPTION'	=> null,
		'DTSTART'		=> null,
		'GEO'			=> null,
		'LAST-MOD'		=> null,
		'LOCATION'		=> null,
		'ORGANIZER'		=> null,
		'PERCENT'		=> null,
		'PRIORITY'		=> null,
		'RECURID'		=> null,
		'SEQ'			=> null,
		'STATUS'		=> null,
		'SUMMARY'		=> null,
		'URL'			=> null,
		'RRULE'			=> null,
		'DUE'			=> null,
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
		'RDATE'			=> null
	];
	protected $subcomponents = [
		'VALARM'
	];
}
