<?php

namespace iCalendar\IO;

class Parser {
	
	private $input = null;
	private $components = [];
	
	public function __construct($input) {
		$input = strval($input);
		$this->input = $input;
		$unwrapped = self::unwrap($this->input);
		$this->components = self::parse($this->input);
	}
	
	public function getComponents(){
		return $this->components;
	}
	
	private static function unwrap($input){
		$unwrapped = preg_replace("/\n\s/", '', $input);
		return $unwrapped;
	}
	
	private static function parse($input){
		$input = trim($input);
		$content_lines = explode("\n", $input);
		
		// array of components to be returned
		$components = [];
		$current_component = null;
		
		foreach($content_lines as $line){
			
			$kvp = explode(":", $line, 2);
			if(false === $kvp || count($kvp) !== 2) continue;
			
			list($key, $value) = $kvp;
			
			if(trim(strtoupper($key)) === 'BEGIN'){
				$component = self::getNewComponent($value);
				if(empty($component)) continue;
				if(null === $current_component){
					$components[] = $component;
				}else{
					$current_component->addComponent($component);
				}
				$current_component = $component;
				continue;
			}
			
			if(trim(strtoupper($key)) === 'END'){
				$current_component = $current_component->parent_component;
				continue;
			}
			
			$params = explode(";", $key);
			if(false === $params) continue;
			$prop_name = array_shift($params);
			$property = self::getNewProperty($prop_name);
			if(empty($property)) continue;
			
			foreach($params as $param){
				$pkvp = explode("=", $param);
				if(false === $pkvp) continue;
				if(count($pkvp) !== 2) continue;
				$parameter = self::getNewParameter($pkvp[0], $pkvp[1]);
				if(null === $parameter){
					var_dump($pkvp);
					exit;
				}
				
				$property->setParameter($parameter);
			}
			
			$property->setValue($value);
			$current_component->setProperty($property);
			
		}
		
		return $components;
	}
	
	private static function getNewParameter($name, $value){
		$name = trim(strtoupper($name));
		$paramnames = [
			"ALTREP" => "\iCalendar\Parameters\AltRep",	
			"CN" => "\iCalendar\Parameters\CommonName",
			"CUTYPE" => "\iCalendar\Parameters\CuType",
			"DELEGATED-FROM" => "\iCalendar\Parameters\DelFrom",
			"DELEGATED-TO" => "\iCalendar\Parameters\DelTo",
			"DIR" => "\iCalendar\Parameters\Dir",
			"ENCODING" => "\iCalendar\Parameters\Encoding",
			"FBTYPE" => "\iCalendar\Parameters\FbType",
			"FMTTYPE" => "\iCalendar\Parameters\FmtType",
			"LANGUAGE" => "\iCalendar\Parameters\Language",
			"MEMBER" => "\iCalendar\Parameters\Member",
			"PARTSTAT" => "\iCalendar\Parameters\PartStat",
			"RANGE" => "\iCalendar\Parameters\Range",
			"RELTYPE" => "\iCalendar\Parameters\RelType",
			"RELATED" => "\iCalendar\Parameters\Related",
			"ROLE" => "\iCalendar\Parameters\Role",
			"RSVP" => "\iCalendar\Parameters\Rsvp",
			"SENT-BY" => "\iCalendar\Parameters\SentBy",
			"TZID" => "\iCalendar\Parameters\Tzid",
			"VALUE" => "\iCalendar\Parameters\Value"	
		];
		if(!isset($paramnames[$name])) return null;
		$param = new $paramnames[$name]($value);
		if(empty($param->value)) return null;
		return $param;
	}
	
	private static function getNewProperty($name){
		$name = trim(strtoupper($name));
		$propnames = [
			"ACTION" => "\iCalendar\Properties\Action",
			"ATTACH" => "\iCalendar\Properties\Attach",
			"ATTENDEE" => "\iCalendar\Properties\Attendee",
			"CALSCALE" => "\iCalendar\Properties\CalScale",
			"CATEGORIES" => "\iCalendar\Properties\Categories",
			"CLASS" => "\iCalendar\Properties\Classification",
			"COMMENT" => "\iCalendar\Properties\Comment",
			"COMPLETED" => "\iCalendar\Properties\Completed",
			"CONTACT" => "\iCalendar\Properties\Contact",
			"CREATED" => "\iCalendar\Properties\Created",
			"DESCRIPTION" => "\iCalendar\Properties\Description",
			"DTEND" => "\iCalendar\Properties\DtEnd",
			"DTSTAMP" => "\iCalendar\Properties\DtStamp",
			"DTSTART" => "\iCalendar\Properties\DtStart",
			"DUE" => "\iCalendar\Properties\Due",
			"DURATION" => "\iCalendar\Properties\Duration",
			"EXDATE" => "\iCalendar\Properties\ExceptionDate",
			"FREEBUSY" => "\iCalendar\Properties\FreeBusy",
			"GEO" => "\iCalendar\Properties\Geo",
			"LAST-MODIFIED" => "\iCalendar\Properties\LastModified",
			"LOCATION" => "\iCalendar\Properties\Location",
			"METHOD" => "\iCalendar\Properties\Method",
			"ORGANIZER" => "\iCalendar\Properties\Organizer",
			"PERCENT-COMPLETE" => "\iCalendar\Properties\PercentComplete",
			"PRIORITY" => "\iCalendar\Properties\Priority",
			"PRODID" => "\iCalendar\Properties\ProdID",
			"RDATE" => "\iCalendar\Properties\RecurDate",
			"RRULE" => "\iCalendar\Properties\RecurRule",
			"RECURRENCE-ID" => "\iCalendar\Properties\RecurrenceID",
			"RELATED-TO" => "\iCalendar\Properties\RelatedTo",
			"REPEAT" => "\iCalendar\Properties\RepeatCount",
			"RESOURCES" => "\iCalendar\Properties\Resources",
			"SEQUENCE" => "\iCalendar\Properties\Sequence",
			"STATUS" => "\iCalendar\Properties\Status",
			"SUMMARY" => "\iCalendar\Properties\Summary",
			"TRANSP" => "\iCalendar\Properties\Transp",
			"TRIGGER" => "\iCalendar\Properties\Trigger",
			"TZID" => "\iCalendar\Properties\TzID",
			"TZNAME" => "\iCalendar\Properties\TzName",
			"TZOFFSETFROM" => "\iCalendar\Properties\TzOffsetFrom",
			"TZOFFSETTO" => "\iCalendar\Properties\TzOffsetTo",
			"TZURL" => "\iCalendar\Properties\TzURL",
			"UID" => "\iCalendar\Properties\UID",
			"URL" => "\iCalendar\Properties\URL",
			"VERSION" => "\iCalendar\Properties\Version"
		];
		if(!isset($propnames[$name])) return null;
		return new $propnames[$name]();
	}
	
	private static function getNewComponent($name){
		$name = trim(strtoupper($name));
		$classnames = [
			"VCALENDAR" => "\iCalendar\iCalendar",
			"VALARM" => "\iCalendar\Components\Alarm",
			"VEVENT" => "\iCalendar\Components\Event",
			"VFREEBUSY" => "\iCalendar\Components\FreeBusy",
			"VJOURNAL" => "\iCalendar\Components\Journal",
			"DAYLIGHT" => "\iCalendar\Components\DaylightTime",
			"STANDARD" => "\iCalendar\Components\StandardTime",
			"VTIMEZONE" => "\iCalendar\Components\TimeZone",
			"VTODO" => "\iCalendar\Components\ToDo"
		];
		if(!isset($classnames[$name])) return null;
		return new $classnames[$name]();
	}
	
}
