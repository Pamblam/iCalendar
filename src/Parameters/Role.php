<?php

namespace iCalendar\Parameters;

class Role extends Parameter{
	protected $name = 'ROLE';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
	
	public function isValidType($value){
		if(!is_a($value, "iCalendar\DataTypes\Text")) return false;
		$value_text = $value->getValue();
		$value_text = strtoupper(trim($value_text));
		return in_array($value_text, [
			"CHAIR",			// chair of the calendar entity
			"REQ-PARTICIPANT",	// a participant whose participation is required
			"OPT-PARTICIPANT",	// a participant whose participation is optional
			"NON-PARTICIPANT"	// a participant who is copied for information purposes only
		]);
	}
	
}