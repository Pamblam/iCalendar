<?php

namespace iCalendar\Parameters;

class RelType extends Parameter{
	protected $name = 'RELTYPE';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
	
	public function isValidType($value){
		if(!is_a($value, "iCalendar\DataTypes\Text")) return false;
		$value_text = $value->getValue();
		$value_text = strtoupper(trim($value_text));
		return in_array($value_text, [
			"PARENT",
			"CHILD",
			"SIBLING"
		]);
	}
	
}