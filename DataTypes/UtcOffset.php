<?php

namespace iCalendar\DataTypes;

class UtcOffset extends DataType {
	protected $name = 'UTC-OFFSET';
	
	public function setValue($value){
		if(!self::isValidUriString($value)) return;
		$this->value = $value;
	}
	
	public static function isValidUtcOffsetString($value){
		if(!is_string($value)) $value = strval($value);
		$pattern = '/^([\+\-])?(\d{2})(\d{2})(\d2)?$/';
		preg_match($pattern, $value, $matches);
		if(empty($matches)) return false;
		if($value === '-0000' || $value === '-000000') return false;
		return true;
	}
	
	public static function strToSeconds($value){
		$pattern = '/^([\+\-])?(\d{2})(\d{2})(\d{2})?$/';
		preg_match($pattern, $value, $matches);
		list($sign, $hour, $min, $sec) = $matches;
		$seconds = $sec + ($min * 60) + ($hour * 60 * 60);
		return $sign === '-' ? -$seconds : $seconds;
	}
	
	function secondsToString($value){
		if(!is_numeric($value)) return null;
		$value = intval($value);
		$sign = $value > 0 ? '+' : ($value < 0 ? '-' : '');
		$value = abs($value);
		$hours = floor($value / (60 * 60));
		$value -= ($hours * (60 * 60));
		$minutes = floor($value / 60);
		$value -= ($minutes * 60);
		$seconds = $value;
		return $sign . 
			str_pad(strval($hours), 2, "0", STR_PAD_LEFT) .
			str_pad(strval($minutes), 2, "0", STR_PAD_LEFT) .
			($seconds ? 
				 str_pad(strval($seconds), 2, "0", STR_PAD_LEFT) : '');
	}
}
