<?php

namespace iCalendar\Parameters;

class FmtType extends Parameter{
	protected $name = 'FMTTYPE';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
	
}