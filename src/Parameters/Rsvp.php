<?php

namespace iCalendar\Parameters;

class Rsvp extends Parameter{
	protected $name = 'RSVP';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Boolean'];	
}