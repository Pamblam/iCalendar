<?php

namespace iCalendar\DataTypes;

class DateTime extends DataType {
	protected $name = 'DATE-TIME';
	
	public function setValue($value){
		if(!is_string($value)) return;
		$time = strtotime($value);
		if(false === $time) return;
		$this->value = date('Ymd\THis', $time);
	}
	
	public static function isValidDateTimeString($value){
		if(!is_string($value)) return false;
		return false !== strtotime($value);
	}
}
