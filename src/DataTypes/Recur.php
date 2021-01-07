<?php

namespace iCalendar\DataTypes;

class Recur extends DataType {
	protected $name = 'RECUR';
	
	public function setValue($value){
		$parsed = [];
		
		if(!is_string($value)) return;
		$value = strtoupper($value);
		
		$parts = explode(";", $value);
		if(false === $parts) return;
		
		foreach($parts as $part){
			$kvp = explode("=", $part);
			if(false === $kvp || 0 === count($kvp)) continue;
			
			$key = trim($kvp[0]);
			$value = trim($kvp[1]);
			$valid = false;
			
			switch($key){
				
				case "FREQ":
					$valid = in_array($value, [
						"SECONDLY", "MINUTELY", "HOURLY", 
						"DAILY", "WEEKLY", "MONTHLY", "YEARLY"
					]);
					break;
				
				case "UNTIL":
					$value = new \iCalendar\DataTypes\DateTime($value);
					$valid = $value->getValue() !== null;
					break;
				
				case "COUNT":
				case "INTERVAL":
					$valid = is_numeric($value);
					$value = intval($value);
					break;
				
				case "BYSECOND":
					$seconds_list = [];
					$seconds = explode(",", $value);
					if(false === $seconds) break;
					foreach($seconds as $second){
						$second = trim($second);
						if(!is_numeric($second)) continue;
						$second = intval($second);
						if($second >= 0 && $second <= 60) $seconds_list[] = $second;
					}
					$valid = !empty($seconds_list);
					$value = $seconds_list;
					break;
					
				case "BYMINUTE":
					$minutes_list = [];
					$minutes = explode(",", $value);
					if(false === $minutes) break;
					foreach($minutes as $minute){
						$minute = trim($minute);
						if(!is_numeric($minute)) continue;
						$minute = intval($minute);
						if($minute >= 0 && $minute <= 59) $minutes_list[] = $minute;
					}
					$valid = !empty($minutes_list);
					$value = $minutes_list;
					break;
				
				case "BYHOUR":
					$hours_list = [];
					$hours = explode(",", $value);
					if(false === $hours) break;
					foreach($hours as $hour){
						$hour = trim($hour);
						if(!is_numeric($hour)) continue;
						$hour = intval($hour);
						if($hour >= 0 && $hour <= 23) $hours_list[] = $hour;
					}
					$valid = !empty($hours_list);
					$value = $hours_list;
					break;
				
				case "BYDAY":
					$day_list = [];
					$daylist = explode(",", $value);
					if(false === $daylist) break;
					foreach($daylist as $daynum){
						$daynum = trim($daynum);
						preg_match_all('/^([+-])?(\d+)?(SU|MO|TU|WE|TH|FR|SA)$/', $daynum, $matches);
						if(empty($matches)) continue;
						if(empty($matches[3])) continue;
						$ordwk = empty($matches[2]) ? null : intval($matches[2]);
						if(null !== $ordwk && ($ordwk < 1 || $ordwk > 53)) $ordwk = null;
						if(null !== $ordwk && $ordwk !== 0 && $matches[1] === '-') $ordwk = -$ordwk;
						$day_list[] = [
							'ordwk' => $ordwk,
							'weekday' => $matches[3]
						];
					}
					$valid = !empty($day_list);
					$value = $day_list;
					break;
					
				case "BYMONTHDAY":
					$month_list = [];
					$molist = explode(",", $value);
					if(false === $molist) break;
					foreach($molist as $monthnum){
						if(!is_numeric($monthnum)) continue;
						$monthnum = intval($monthnum);
						$abs = abs($monthnum);
						if($abs < 1 || $abs > 31) continue;
						$month_list[] = $monthnum;
					}
					$valid = !empty($month_list);
					$value = $month_list;
					break;
				
				case "BYSETPOS":
				case "BYYEARDAY":
					$byyrdaylist = [];
					$yeardaynums = explode(",", $value);
					if(false === $yeardaynums) break;
					foreach($yeardaynums as $yeardaynum){
						if(!is_numeric($yeardaynum)) continue;
						$yeardaynum = intval($yeardaynum);
						$abs = abs($yeardaynum);
						if($abs < 1 || $abs > 366) continue;
						$byyrdaylist[] = $yeardaynum;
					}
					$valid = !empty($byyrdaylist);
					$value = $byyrdaylist;
					break;
				
				case "BYWEEKNO":
					$bywknolist = [];
					$weeknums = explode(",", $value);
					if(false === $weeknums) break;
					foreach($weeknums as $weeknum){
						if(!is_numeric($weeknum)) continue;
						$weeknum = intval($weeknum);
						$abs = abs($weeknum);
						if($abs < 1 || $abs > 53) continue;
						$bywknolist[] = $weeknum;
					}
					$valid = !empty($bywknolist);
					$value = $bywknolist;
					break;
				
				case "BYMONTH":
					$bymolist = [];
					$monthnums = explode(",", $value);
					if(false === $monthnums) break;
					foreach($monthnums as $monthnum){
						if(!is_numeric($monthnum)) continue;
						$monthnum = intval($monthnum);
						$abs = abs($monthnum);
						if($abs < 1 || $abs > 12) continue;
						$bymolist[] = $monthnum;
					}
					$valid = !empty($bymolist);
					$value = $bymolist;
					break;
				
				case "WKST":
					$valid = in_array($value, ["SU", "MO", "TU", "WE", "TH", "FR", "SA"]);
					break;
				
			}
			
			if($valid) $parsed[$key] = $value;
		}
		
		if(!empty($parsed['FREQ'])) $this->value = $parsed;
		
	}
	
	public static function isValueCastable($value){
		$tmp = new \iCalendar\DataType\Recur($value);
		return !empty($tmp->value);
	}
	
}
