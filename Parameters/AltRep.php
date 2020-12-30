<?php

namespace iCalendar\Parameters;

class AltRep extends Parameter{
	protected $name = 'ALTREP';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Uri'];
	
	
}
