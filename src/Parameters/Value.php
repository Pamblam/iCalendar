<?php

namespace iCalendar\Parameters;

class Value extends Parameter{
	protected $name = 'VALUE';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
	
	public function isValidType($value){
		if(!is_a($value, "iCalendar\DataTypes\Text")) return false;
		$value_text = $value->getValue();
		$value_text = strtoupper(trim($value_text));
		return in_array($value_text, [
			"BINARY",
			"BOOLEAN",
			"CAL-ADDRESS",
			"DATE",
			"DATE-TIME",
			"DURATION",
			"FLOAT",
			"INTEGER",
			"PERIOD",
			"RECUR",
			"TEXT",
			"TIME",
			"URI",
			"UTC-OFFSET"
		]);
	}
	
}