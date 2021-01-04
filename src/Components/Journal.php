<?php

namespace iCalendar\Components;

class Journal extends Component{
	protected $name = 'VJOURNAL';
	protected $properties = [
		'DTSTAMP'		=> null,
		'UID'			=> null,
		'CLASS'			=> null,
		'CREATED'		=> null,
		'DTSTART'		=> null,
		'LAST-MOD'		=> null,
		'ORGANIZER'		=> null,
		'RECURID'		=> null,
		'SEQ'			=> null,
		'STATUS'		=> null,
		'SUMMARY'		=> null,
		'URL'			=> null,
		'RRULE'			=> null,
		'ATTACH'		=> null,
		'ATTENDEE'		=> null,
		'CATEGORIES'	=> null,
		'COMMENT'		=> null,
		'CONTACT'		=> null,
		'DESCRIPTION'	=> null,
		'EXDATE'		=> null,
		'RELATED'		=> null,
		'RDATE'			=> null,
		'RSTATUS'		=> null
	];
}