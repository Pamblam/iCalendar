<?php

namespace iCalendar\Components;

class ToDo extends Component{
	protected $name = 'VTODO';
	protected $properties = [];
	protected $subcomponents = [
		'VALARM'
	];
}
