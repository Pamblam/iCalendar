<?php

namespace iCalendar\DataTypes;

class Duration extends DataType {
	protected $name = 'DURATION';
	
	public function setValue($value){
		if(is_int($value)) $value = self::secondsToStr($seconds);
		if(is_string($value) && is_numeric($value)){
			$value = intval($value);
			$value = self::secondsToStr($seconds);
		}
		if(!self::isValidDurationString($value)) return;
		$this->value = $value;
	}
	
	public static function isValidDurationString($value){
		if(!is_string($value)) return false;
		$pattern = '/^([\-\+])?P(\d+W)?(\d+D)?(T(\d+H)?(\d+M)?(\d+S)?)?$/';
		preg_match($pattern, $value, $matches);
		return !empty($matches);
	}
	
	public static function secondsToStr($intval){
		if(is_string($value) && is_numeric($value)) $value = intval($value);
		if(!is_int($intval)) return null;
		
		$sign = $intval < 0 ? '-' : '';
		$remaining = abs($intval);

		$seconds_per = [
			'W' => 7 * 24 * 60 * 60, // week
			'D' => 24 * 60 * 60, // day
			'H' => 60 * 60, // hour
			'M' => 60, // hour
			'S' => 1 // second
		];

		$parts = [];

		foreach($seconds_per as $ind=>$per){
			if($remaining < $per) continue;
			$quantity = floor($remaining / $per);
			$parts[$ind] = $quantity;
			$remaining -= ($quantity * $per);
		}


		$has_time = isset($parts['H']) || isset($parts['M']) || isset($parts['S']);
		$has_days = isset($parts['D']);
		$has_weeks = isset($parts['W']);

		// If it has any time parameters, it must have all time parameters
		if($has_time){
			$wd = ['H', 'M', 'S'];
			foreach($wd as $ind){
				if(empty($parts[$ind])){
					$parts[$ind] = 0;
				}
			}
		}

		// if it has weeks and also day, hour, minute, or sec
		// weeks must be converted to days
		if($has_weeks && ($has_time || $has_days)){
			if(empty($parts['D'])) $parts['D'] = 0;
			$parts['D'] += ($parts['W'] * 7);
			unset($parts['W']);
		}

		$buffer = [$sign."P"];
		$wd = ['W', 'D'];
		foreach($wd as $ind){
			if(isset($parts[$ind])){
				$buffer[] = "{$parts[$ind]}".$ind;
				unset($parts[$ind]);
			}
		}
		if(!empty($parts)) $buffer[] = "T";
		$wd = ['H', 'M', 'S'];
		foreach($wd as $ind){
			if(isset($parts[$ind])){
				$buffer[] = "{$parts[$ind]}".$ind;
				unset($parts[$ind]);
			}
		}

		$str = implode('', $buffer);
	}
	
	public static function strToSeconds($value){
		$pattern = '/^([\-\+])?P(\d+W)?(\d+D)?(T(\d+H)?(\d+M)?(\d+S)?)?$/';
		preg_match($pattern, $value, $matches);
		if(empty($matches)) return null;
		list($full, $sign, $week, $day, $time, $hour, $min, $sec) = $matches;
		$week = intval(substr($week, 0, -1)) * 7 * 24 * 60 * 60;
		$day = intval(substr($day, 0, -1)) * 24 * 60 * 60;
		$hour = intval(substr($hour, 0, -1)) * 60 * 60;
		$min = intval(substr($min, 0, -1)) * 60;
		$sec = intval(substr($sec, 0, -1));
		$seconds = $week + $day + $hour + $min + $sec;
		if($sign === '-') $seconds = -$seconds;
		return $seconds;
	}
}
