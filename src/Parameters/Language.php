<?php

namespace iCalendar\Parameters;

class Language extends Parameter{
	protected $name = 'LANGUAGE';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];	
}