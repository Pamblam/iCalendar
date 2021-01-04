<?php

namespace iCalendar\Parameters;

class PartStat extends Parameter{
	protected $name = 'PARTSTAT';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
	
	public function isValidType($value){
		if(!is_a($value, "iCalendar\DataTypes\Text")) return false;
		$value_text = $value->getValue();
		$value_text = strtoupper(trim($value_text));
		return in_array($value_text, [
			"NEEDS-ACTION",		// Event/To-do/Journal needs action
			"ACCEPTED",			// Event/To-do/Journal accepted
			"DECLINED",			// Event/To-do/Journal declined
			"TENTATIVE",		// Event/To-do tentatively accepted
			"DELEGATED",		// Event/To-do delegated
			"COMPLETED",		// To-do completed
			"IN-PROCESS",		// To-do in-process
		]);
	}
	
}