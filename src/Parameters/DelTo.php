<?php

namespace iCalendar\Parameters;

class DelTo extends Parameter{
	protected $name = 'DELEGATED-TO';
	protected $values = [];
	protected $multi_values = true;
	protected $acceptable_types = ['Uri'];
}