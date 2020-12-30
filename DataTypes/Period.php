<?php

namespace iCalendar\DataTypes;

class Period extends DataType {
	protected $name = 'PERIOD';
	
	public function setValue($value){
		if(!self::isValidPeriodString($value)) return;
		$this->value = $value;
	}
	
	public static function isValidPeriodString(){
		if(!is_string($value)) return false;
		$parts = explode("/", $value);
		if(count($parts) !== 2) return false;
		if(!DateTime::isValidDateTimeString($parts[0])) return false;
		$is_date = DateTime::isValidDateTimeString($parts[1]);
		$is_duration = DateTime::isValidDurationString($parts[1]);
		return $is_date || $is_duration;
	}
	
}
