<?php

namespace iCalendar\Parameters;

class Tzid extends Parameter{
	protected $name = 'TZID';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];	
}